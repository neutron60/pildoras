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
use Illuminate\Support\Str;


class PurchaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


/*----------------------------------------------------------------------*/
/*  CLIENT FUNCTION */

    public function index_my_purchases()
    {
        $user=Auth::user();
        $id = Auth::id();

        $purchases=$this->index_order_basic()
        ->where('purchases.payment_type','<>','0')->where('purchases.amount_paid','>',0)
        ->where('purchases.verified_payment', '=', 1)
        ->where('purchases.invoice_number','<>','0')
        ->where('purchases.user_id', '=', $id)
        ->paginate(20);

        foreach($purchases as $purchase){
            $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
            $purchase->price=number_format($purchase->price,2,",",".");
        }

      $query1='%';
      $query2='%';

      $departments=Department::where('is_active', 1)->get();
      $advertisings=Advertising::all();
      $advertising=$advertisings->first();
      $aside_advertisings=AsideAdvertising::all();

        return view("client.purchase.index_my_purchases", compact("purchases", "departments", "created_at", "aside_advertisings", "advertising", "query1", "query2","user"));
    }

    public function index_search_my_purchases(Request $request)
    {
    $user=Auth::user();
    $id = Auth::id();

    $query1=trim($request->get('search_order'));
    $query2=trim($request->get('search_article'));
    if (!$query1) {$query1='%';}
    if (!$query2) {$query2='%';}

    $purchases=$this->index_order_basic()
    ->where('purchases.payment_type','<>','0')->where('purchases.amount_paid','>',0)
    ->where('purchases.verified_payment', '=', 1)->where('purchases.invoice_number','<>','0')
    ->where('purchases.user_id', '=', $id)
    ->where('purchases.order_number', 'LIKE', '%'. $query1. '%')
    ->where('purchase_details.article_name', 'LIKE', '%'. $query2. '%')
    ->paginate(20);

    foreach($purchases as $purchase){
        $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $purchase->price=number_format($purchase->price,2,",",".");
    }

    $departments=Department::where('is_active', 1)->get();
    $advertisings=Advertising::all();
    $advertising=$advertisings->first();
    $aside_advertisings=AsideAdvertising::all();
    return view("client.purchase.index_my_purchases", compact("purchases", "departments", "created_at", "aside_advertisings", "advertising", "query1", 'query2','user'));
    }

    public function show_my_purchase($id)
    {
        $purchase=Purchase::findOrFail($id);
        if($purchase->verified_payment <> 1 || empty($purchase->invoice_number)){
            return redirect()->action('PurchaseController@index_my_purchases');
        }

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;
        $id = Auth::id();
            if($id <> $user->id){
            return redirect()->action('PurchaseController@index_my_purchases');
        }

        $order_calculation=$this->order_calculation($purchase_detail);

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $user->id_number=number_format($user->id_number,0,",",".");

        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        if($purchase->requires_shipping == 0){ $message='retiro en tienda';}
        if($purchase->requires_shipping == 1){ $message='envio a oficina de correo';}
        if($purchase->requires_shipping == 2){ $message='envio a direccion';}

        return view("client.purchase.show_my_purchase", compact("purchase", "departments", "user", "purchase_detail", "order_calculation", "aside_advertisings", "advertising", "created_at", "message"));

    }

    public function index_my_orders()
    {
        $id = Auth::id();
        $user=User::find($id);

        $purchases=$this->index_order_basic()
        ->where('purchases.user_id', '=', $id)->where('purchases.invoice_number','0')
        ->paginate(20);

        foreach($purchases as $purchase){
            $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
            $purchase->price=number_format($purchase->price,2,",",".");
        }

        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        return view("client.purchase.index_my_orders", compact("purchases", "departments", "created_at", "aside_advertisings", "advertising", "user"));
    }

    public function show_my_orders($id)
    {
        $purchase=Purchase::findOrFail($id);
        if (!empty($purchase->invoice_number)){return redirect()->action('PurchaseController@index_my_orders');}

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;
        $id = Auth::id();
        if($id <> $user->id){
            return redirect()->action('PurchaseController@index_my_orders');
        }

        $order_calculation=$this->order_calculation($purchase_detail);

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $user->id_number=number_format($user->id_number,0,",",".");

        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        if($purchase->requires_shipping == 0){ $message='retiro en tienda';}
        if($purchase->requires_shipping == 1){ $message='envio a oficina de correo';}
        if($purchase->requires_shipping == 2){ $message='envio a direccion';}

        return view("client.purchase.show_my_purchase", compact("purchase", "departments", "user", "purchase_detail", "order_calculation", "aside_advertisings", "advertising", "created_at", "message"));

    }

/*----------------------------------------------------------------------*/
/*  SELLER FUNCTION */

public function index_search_order_requested(Request $request)
    {
    $query1=trim($request->get('search_order'));
    $query2=trim($request->get('search_name'));
    $query3=trim($request->get('search_id_number'));

    if (!$query1) {$query1='%';}
    if (!$query2) {$query2='%';}
    if (!$query3) {$query3='%';}

    $purchases=$this->index_order_basic()
        ->where('purchases.payment_type','0')
        ->where('purchases.amount_paid',0.0)
        ->where('purchases.verified_payment', 0)
        ->where('purchases.order_number', 'LIKE', '%'. $query1. '%')
        ->where('users.name', 'LIKE', '%'. $query2. '%')
        ->where('users.id_number', 'LIKE', '%'. $query3. '%')
        ->paginate(20);

    foreach($purchases as $purchase){
        $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $purchase->price=number_format($purchase->price,2,",",".");
        $purchase->id_number=number_format($purchase->id_number,0,",",".");
    }
    $flag=1;

    $advertisings=Advertising::all();
    $advertising=$advertisings->first();
    $aside_advertisings=AsideAdvertising::all();
    $user = Auth::user();

    return view("seller.purchase.index_order_requested", compact("purchases", "aside_advertisings", "advertising", "created_at", "flag", "query1", "query2", "query3", "user"));
    }

public function index_order_requested()
    {
    $purchases=$this->index_order_basic()
       ->where('purchases.payment_type','0')
       ->where('purchases.amount_paid',0.0)
       ->where('purchases.verified_payment', 0)
       ->paginate(20);

    foreach($purchases as $purchase){
        $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $purchase->price=number_format($purchase->price,2,",",".");
        $purchase->id_number=number_format($purchase->id_number,0,",",".");
    }
    $flag=1;

    $query1='%';
    $query2='%';
    $query3='%';
    $advertisings=Advertising::all();
    $advertising=$advertisings->first();
    $aside_advertisings=AsideAdvertising::all();
    $user = Auth::user();

    return view("seller.purchase.index_order_requested", compact("purchases", "aside_advertisings", "advertising", "created_at", "flag", "query1", 'query2', "query3","route", "user"));
    }

    public function index_order_verified_payment()
    {

        $purchases=$this->index_order_basic()
        ->where('purchases.payment_type','<>','0')->where('purchases.amount_paid', '>', 0)
        ->where('purchases.verified_payment', 0)
        ->paginate(20);

        foreach($purchases as $purchase){
            $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
            $purchase->price=number_format($purchase->price,2,",",".");
            $purchase->id_number=number_format($purchase->id_number,0,",",".");
        }
        $flag=2;
        $query1='%';
        $query2='%';
        $query3='%';
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("seller.purchase.index_order_requested", compact("purchases", "aside_advertisings", "advertising", "created_at", "flag", "query1", "query2", "query3", "user"));
}

    public function index_order_assign_invoice()
    {

        $purchases=$this->index_order_basic()
        ->where('purchases.payment_type','<>','0')->where('purchases.amount_paid', '>', 0)
        ->where('purchases.verified_payment', 1)->where('purchases.invoice_number','0')
        ->paginate(20);

        foreach($purchases as $purchase){
            $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
            $purchase->price=number_format($purchase->price,2,",",".");
            $purchase->id_number=number_format($purchase->id_number,0,",",".");
        }
        $flag=3;
        $query1='%';
        $query2='%';
        $query3='%';
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("seller.purchase.index_order_requested", compact("purchases", "aside_advertisings", "advertising", "created_at", "flag", "query1", "query2", "query3", "user"));
    }

    public function index_search_sales(Request $request)
    {
            $query1=trim($request->get('search_order'));
            $query2=trim($request->get('search_name'));
            $query3=trim($request->get('search_id_number'));

            if (!$query1) {$query1='%';}
            if (!$query2) {$query2='%';}
            if (!$query3) {$query3='%';}

            $purchases=$this->index_order_basic()
            ->where('purchases.payment_type','<>','0')->where('purchases.amount_paid','<>',0)
            ->where('purchases.verified_payment', 1)->where('purchases.invoice_number','<>','0')
                ->where('purchases.order_number', 'LIKE', '%'. $query1. '%')
                ->where('users.name', 'LIKE', '%'. $query2. '%')
                ->where('users.id_number', 'LIKE', '%'. $query3. '%')
                ->paginate(20);

                foreach($purchases as $purchase){
                    $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
                    $purchase->price=number_format($purchase->price,2,",",".");
                    $purchase->id_number=number_format($purchase->id_number,0,",",".");
                }

            $advertisings=Advertising::all();
            $advertising=$advertisings->first();
            $aside_advertisings=AsideAdvertising::all();
            $user = Auth::user();

                return view("seller.purchase.index_sales", compact("purchases", "created_at", "aside_advertisings", "advertising", "query1", 'query2', "query3", "user"));
    }

    public function index_sales()
    {

        $purchases=$this->index_order_basic()
        ->where('purchases.payment_type','<>','0')->where('purchases.amount_paid','<>',0)
        ->where('purchases.verified_payment', 1)->where('purchases.invoice_number','<>','0')
        ->paginate(20);

        foreach($purchases as $purchase){
        $created_at[$purchase->id]=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $purchase->price=number_format($purchase->price,2,",",".");
        $purchase->id_number=number_format($purchase->id_number,0,",",".");
    }

      $query1='%';
      $query2='%';
      $query3='%';
      $advertisings=Advertising::all();
      $advertising=$advertisings->first();
      $aside_advertisings=AsideAdvertising::all();
      $user = Auth::user();


        return view("seller.purchase.index_sales", compact("purchases", "created_at", "aside_advertisings", "advertising", "query1", 'query2', "query3", "user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_order_requested($id)
    {

        $purchase=Purchase::findOrFail($id);

        if($purchase->invoice_number <> '0') {return back();}

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;

        $order_calculation=$this->order_calculation($purchase_detail);

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        if(empty($purchase->payment_day)){$payment_day=$purchase->payment_day;}
        else{$payment_day=Carbon::parse($purchase->payment_day)->format('d-m-Y');}

        $user->id_number=number_format($user->id_number,0,",",".");
        $purchase->amount_paid=number_format($purchase->amount_paid,2,",",".");

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        if($purchase->requires_shipping == 0){ $message='retiro en tienda';}
        if($purchase->requires_shipping == 1){ $message='envio a oficina de correo';}
        if($purchase->requires_shipping == 2){ $message='envio a direccion';}

      return view("seller.purchase.show_order_requested", compact("purchase", "user", "purchase_detail", "order_calculation", "aside_advertisings", "advertising", "created_at", "message", "payment_day"));
    }

    public function show_sales_detail($id)
    {
        $purchase=Purchase::findOrFail($id);
        if($purchase->verified_payment == 0 || empty($purchase->invoice_number)){
            return redirect()->action('PurchaseController@index_sales');
        }

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;

        $order_calculation=$this->order_calculation($purchase_detail);

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        if(empty($purchase->payment_day)){$payment_day=$purchase->payment_day;}
        else{$payment_day=Carbon::parse($purchase->payment_day)->format('d-m-Y');}

        $user->id_number=number_format($user->id_number,0,",",".");
        $purchase->amount_paid=number_format($purchase->amount_paid,2,",",".");

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        return view("seller.purchase.show_sales_detail", compact("purchase", "user", "purchase_detail", "order_calculation", "aside_advertisings", "advertising", "created_at", "payment_day"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_order_requested($id)
    {

        $purchase=Purchase::findOrFail($id);
        if($purchase->verified_payment == 1 || $purchase->amount_paid > 0){
            return redirect()->action('PurchaseController@index_order_requested');
        }

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;

        $order_calculation=$this->order_calculation($purchase_detail);

        if($purchase->requires_shipping == 0){ $message='retiro en tienda';}
        if($purchase->requires_shipping == 1){ $message='envio a oficina de correo';}
        if($purchase->requires_shipping == 2){ $message='envio a direccion';}

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $user->id_number=number_format($user->id_number,0,",",".");
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        return view("seller.purchase.edit_order_requested", compact("purchase", "user", "purchase_detail", "order_calculation", "message", "aside_advertisings", "advertising", "created_at"));
    }


    public function edit_order_payment_details($id)
    {
        $purchase=Purchase::findOrFail($id);
        if($purchase->verified_payment == 1 || $purchase->amount_paid > 0){
            return redirect()->action('PurchaseController@index_order_requested');
        }

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;

        $order_calculation=$this->order_calculation($purchase_detail);

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $user->id_number=number_format($user->id_number,0,",",".");

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        if($purchase->require_shipping == 0){$require_shipping='retiro en tienda';}
        if($purchase->require_shipping == 1){$require_shipping='envio a oficina de correo';}
        if($purchase->require_shipping == 2){$require_shipping='envio a direccion';}

        return view("seller.purchase.edit_order_payment_details", compact("purchase", "user", "purchase_detail", "order_calculation", "aside_advertisings", "advertising", "created_at", "require_shipping"));
    }

    public function edit_order_verified_payment($id)
    {
        $purchase=Purchase::findOrFail($id);
        if($purchase->verified_payment == 1 || $purchase->amount_paid == 0){
            return redirect()->action('PurchaseController@index_order_verified_payment');
        }

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;

        $order_calculation=$this->order_calculation($purchase_detail);


        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        if(empty($purchase->payment_day)){$payment_day=$purchase->payment_day;}
        else{$payment_day=Carbon::parse($purchase->payment_day)->format('d-m-Y');}

        $user->id_number=number_format($user->id_number,0,",",".");
        $purchase->amount_paid=number_format($purchase->amount_paid,2,",",".");

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        if($purchase->require_shipping == 0){$require_shipping='retiro en tienda';}
        if($purchase->require_shipping == 1){$require_shipping='envio a oficina courier';}
        if($purchase->require_shipping == 2){$require_shipping='envio a direccion';}

        return view("seller.purchase.edit_order_verified_payment", compact("purchase", "user", "purchase_detail","order_calculation", "aside_advertisings", "advertising", "created_at", "require_shipping", "payment_day"));
    }

    public function edit_order_assign_invoice($id)
    {
        $purchase=Purchase::findOrFail($id);
        if($purchase->verified_payment == 0 || !empty($purchase->invoice_number)){
            return redirect()->action('PurchaseController@index_order_assign_invoice');
        }

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;

        $order_calculation=$this->order_calculation($purchase_detail);

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');
        $user->id_number=number_format($user->id_number,0,",",".");
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        if($purchase->require_shipping == 0){$require_shipping='retiro en tienda';}
        if($purchase->require_shipping == 1){$require_shipping='envio a oficina courier';}
        if($purchase->require_shipping == 2){$require_shipping='envio a direccion';}

        return view("seller.purchase.edit_order_assign_invoice", compact("purchase", "user", "purchase_detail", "order_calculation", "aside_advertisings", "advertising", "created_at", "require_shipping"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_order_requested(PurchaseRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);

        $entrada->update($request->only('requires_shipping', 'courier_name', 'shipping_address',
        'shipping_city', 'shipping_state', 'shipping_zip_code'));

        return redirect()->action('PurchaseController@index_order_requested')->with('info', 'la orden'. ' '."$entrada->id" .' '.'fue actualizada');
    }


    public function update_order_payment_details(PurchaseRequest $request, $id)
    {

        $purchase=Purchase::findOrFail($id);
        $purchase_detail=$purchase->purchase_details->first();


        $payment=$request->get('amount_paid');


        if($payment < $purchase_detail->price){
        return redirect()->action('PurchaseController@edit_order_payment_details',compact("id"))->with('info', 'No se registro el pago porque el monto pagado es menor al monto de la compra');
        }

        $purchase->update($request->only('payment_type', 'amount_paid', 'issuing_bank',
        'receiving_bank', 'payment_day','operation_number'));

        return redirect()->action('PurchaseController@index_order_requested')->with('info', 'los datos del pago de la orden ' . $purchase-> order_number . ' fueron actualizados');
    }

    public function update_order_verified_payment(PurchaseRequest $request, $id)
    {

        $entrada=Purchase::findOrFail($id);

        if($request->get('verified_payment') == 0){
            return redirect()->action('PurchaseController@index_order_requested')->with('info', 'los datos del pago de la orden ' . $entrada-> order_number . ' NO fueron verificados');
        }

        $entrada->update($request->only('verified_payment'));

        return redirect()->action('PurchaseController@index_order_requested')->with('info', 'los datos del pago de la orden ' . $entrada-> order_number . ' fueron verificados');
    }

    public function update_order_assign_invoice(PurchaseRequest $request, $id)
    {
        $purchase=Purchase::findOrFail($id);

        if(!$purchase->verified_payment){
            return redirect()->route('seller.purchase', $purchase->id)->with('info', 'el pago de la orden ' . $purchase-> order_number . ' no ha sido confirmado');
            }

        $purchase->update($request->only('invoice_number'));

        return redirect()->action('PurchaseController@index_sales')->with('info', 'la orden ' . $purchase-> order_number . ' ha sido completada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $purchase=Purchase::findOrfail($id);
        $purchase->delete();

        $purchase_detail=$purchase->purchase_details->first();

        $purchase_detail->delete();

        return redirect()->action('PurchaseController@index_order_requested')->with('info', 'la orden ' . $purchase-> order_number . ' fue eliminada');
    }


/*----------------------------------------------------------------------*/
/*  INTERN FUNCTION */

    public function index_order_basic()
    {
        $purchases_basic=Purchase::join('users','users.id','=','purchases.user_id')
        ->join('purchase_details','purchase_details.purchase_id','=','purchases.id')
        ->select('purchases.id','purchases.order_number', 'purchases.verified_payment', 'purchases.requires_shipping', 'purchases.invoice_number',
        'purchases.created_at',  'purchases.amount_paid', 'purchases.payment_type',
        'users.name as user_name', 'users.lastname as user_lastname', 'users.id_number', 'users.id as id_list',
        'purchase_details.article_name', 'purchase_details.purchased_amount', 'purchase_details.price', 'purchase_details.iva', 'purchase_details.article_code',
        'purchase_details.created_at as purchase_details_created_at')
        ->orderBy('purchase_details_created_at','desc');

       return $purchases_basic;
   }

public function order_calculation($purchase_detail)
    {
    $order_calculation['unit_price']= ($purchase_detail->price*100)/(100+$purchase_detail->iva);
    $order_calculation['total_price']=$purchase_detail->purchased_amount * $order_calculation['unit_price'] ;
    $order_calculation['sub_total']=$order_calculation['total_price'];
    $order_calculation['iva']=$order_calculation['sub_total'] * ($purchase_detail->iva/100);
    $order_calculation['total']=$order_calculation['sub_total']+$order_calculation['iva'];

    $order_calculation['total_price']=number_format($order_calculation['total_price'],2,",",".");
    $order_calculation['sub_total']=number_format($order_calculation['sub_total'],2,",",".");
    $order_calculation['iva']=number_format($order_calculation['iva'],2,",",".");
    $order_calculation['total']=number_format($order_calculation['total'],2,",",".");
    $order_calculation['unit_price']=number_format($order_calculation['unit_price'],2,",",".");

    return $order_calculation;
    }



}
