<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Department;
use App\Article;
use App\Purchase;
use App\PurchaseDetail;
use App\AsideAdvertising;
use App\Advertising;
use Carbon\Carbon;


class PurchaseClientController extends Controller
{

    var $iva=16;


    public function create_purchase(Request $request){

        $id = Auth::id();
        $user=User::find($id);

        if(empty($user->id_number) || empty($user->id_type) ){
        return back()->with('info', 'Para comprar debe tener registrado un ID');
        }

        $purchased_amount=$request->get('purchased_amount');
        $purchased_item=$request->get('article_id');

        return redirect()->action('PurchaseClientController@create_order', compact("purchased_amount", "purchased_item"));
    }

    public function create_order($purchased_amount, $purchased_item)
{

    $id = Auth::id();
    $user=User::find($id);

    $departments=Department::where('is_active', 1)->get();

    $article=Article::find($purchased_item);

    $order_calculation=$this->order_calculation($article, $purchased_amount);

    $advertisings=Advertising::all();
    $advertising=$advertisings->first();
    $aside_advertisings=AsideAdvertising::all();


    $user = Auth::user();

    if(empty($user)){
        return back()->with('info', 'Para comprar debe tener registrado un ID');
    }

    $role_type=$user->role;

if($role_type->role_name == "administrador"){
return view("admin.purchase.create_order", compact("user", "departments", "article", "purchased_amount", "order_calculation", "aside_advertisings", "advertising"));}

if($role_type->role_name == "vendedor"){
return view("seller.purchase.create_order", compact("user", "departments", "article", "purchased_amount", "order_calculation", "aside_advertisings", "advertising"));}

if($role_type->role_name == "cliente"){
return view("client.purchase.create_order", compact("user", "departments", "article", "purchased_amount", "order_calculation", "aside_advertisings", "advertising"));}

 if($role_type->role_name == "inactivo"){
    return back()->with('info', 'Para comprar debe tener registrado un ID');}

}

public function store_order(PurchaseRequest $request)
    {
        $entrada=$request->only('requires_shipping', 'courier_name', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip_code');

        $id = Auth::id();
        $entrada['user_id'] = $id;

        $departments=Department::where('is_active', 1)->get();

        $order_number=$this->order_number();
        $entrada['order_number'] =$order_number;
        $archivo=Purchase::create($entrada);

        $entrada1=$request->only('article_id', 'purchased_amount');

        $article=Article::find($request->get('article_id'));
        $entrada1['article_id'] = $article->id;
        $entrada1['price'] = $article->price;
        $entrada1['article_name'] = $article->name;
        $purchase=Purchase::all()->last();
        $entrada1['purchase_id'] = $purchase->id;
        $entrada1['iva'] = $this->iva;
        $archivo1=PurchaseDetail::create($entrada1);
        $article['stock']=$article->stock - $request->get('purchased_amount');
        $article->update($request->only('stock'));

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();


        $user = Auth::user();

        if(empty($user)){
            return back()->with('info', 'Comuniquese con el administrador');
        }

        $role_type=$user->role;

    if($role_type->role_name == "administrador"){
    return view("admin.purchase.order_shipped", compact("departments", "order_number", "aside_advertisings", "advertising"));}

    if($role_type->role_name == "vendedor"){
    return view("seller.purchase.order_shipped", compact("departments", "order_number", "aside_advertisings", "advertising"));}

    if($role_type->role_name == "cliente"){
    return view("client.purchase.order_shipped", compact("departments", "order_number", "aside_advertisings", "advertising"));}

     if($role_type->role_name == "inactivo"){
        return back()->with('info', 'Comuniquese con el administrador');}

    }

    public function neutron_inactive()
    {
        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        return view("neutron.inactive", compact("departments", "aside_advertisings", "advertising"));


    }


   /* public function order_shipped()
    {
        return view("client.purchase.create_order", compact("user", "article", "purchased_amount", "total_price", "sub_total", "iva", "total", "aside_advertisings"));
    }*/


/*----------------------------------------------------------------------*/
/*  INTERN FUNCTION */

    public function index_order_basic()
    {
        $purchases_basic=Purchase::join('users','users.id','=','purchases.user_id')
        ->join('purchase_details','purchase_details.purchase_id','=','purchases.id')
        ->join('articles','articles.id','=','purchase_details.article_id')
        ->select('purchases.id','purchases.order_number', 'purchases.verified_payment', 'purchases.requires_shipping', 'purchases.invoice_number',
        'purchases.created_at', 'purchases.user_id',
        'users.name as user_name', 'users.lastname as user_lastname', 'users.id_number', 'users.id as id_list',
        'purchase_details.article_name', 'purchase_details.purchased_amount', 'purchase_details.price', 'purchase_details.iva',
        'purchase_details.created_at as purchase_details_created_at',
        'articles.code')
        ->orderBy('purchase_details_created_at','desc');
        return $purchases_basic;
   }

   public function order_calculation($article, $purchased_amount)
    {
    $order_calculation['unit_price']= ($article->price*100)/(100+$this->iva);
    $order_calculation['total_price']=$purchased_amount * $order_calculation['unit_price'] ;
    $order_calculation['sub_total']=$order_calculation['total_price'];
    $order_calculation['iva']=$order_calculation['sub_total'] * ($this->iva/100);
    $order_calculation['total']=$order_calculation['sub_total']+$order_calculation['iva'];

    $order_calculation['total_price']=number_format($order_calculation['total_price'],2,",",".");
    $order_calculation['sub_total']=number_format($order_calculation['sub_total'],2,",",".");
    $order_calculation['iva']=number_format($order_calculation['iva'],2,",",".");
    $order_calculation['total']=number_format($order_calculation['total'],2,",",".");
    $order_calculation['unit_price']=number_format($order_calculation['unit_price'],2,",",".");

    return $order_calculation;
    }


    public function order_number()
    {
        $order=Purchase::all()->last();
        if($order){$order_number=$order->order_number + 1;}
        else{$order_number=1;}

        return $order_number;
    }



}
