<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseAddressRequest;
use App\Http\Requests\PurchaseCourierRequest;
use App\Http\Requests\PurchasePaymentRequest;
use App\Http\Requests\PurchasePaymentVerifiedRequest;
use App\Http\Requests\PurchaseStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\Purchase;
use App\PurchaseDetail;
use App\AsideAdvertising;
use Carbon\Carbon;


class PurchaseController extends Controller
{
    var $iva=16;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $purchases=Purchase::join('users','users.id','=','purchases.user_id')
        ->join('purchase_details','purchase_details.purchase_id','=','purchases.id')
        ->join('articles','articles.id','=','purchase_details.article_id')
        ->select('purchases.id','purchases.order_number', 'purchases.verified_payment',
        'users.name as user_name', 'users.lastname as user_lastname', 'users.id_number',
        'purchase_details.article_name', 'purchase_details.purchased_amount', 'purchase_details.price', 'purchase_details.iva',
        'articles.code')
        ->orderBy('order_number')->orderBy('user_name')
        ->where('purchases.verified_payment', 0)
        ->paginate(20);
        foreach($purchases as $purchase)
        $purchase->price=number_format($purchase->price,2,",",".");

        $query1='%';
        $query2='%';
        $query3='%';
        $aside_advertisings=AsideAdvertising::all();

        return view("seller.purchase.index", compact("purchases", "aside_advertisings", "query1", 'query2', "query3"));
    }

    public function search_order(Request $request)
    {
            $query1=trim($request->get('search_order'));
            $query2=trim($request->get('search_name'));
            $query3=trim($request->get('search_id_number'));
            if (!$query1) {$query1='%';}
            if (!$query2) {$query2='%';}
            if (!$query3) {$query3='%';}

            $purchases=Purchase::join('users','users.id','=','purchases.user_id')
            ->join('purchase_details','purchase_details.purchase_id','=','purchases.id')
            ->join('articles','articles.id','=','purchase_details.article_id')
            ->select('purchases.id','purchases.order_number', 'purchases.verified_payment',
            'users.name as user_name', 'users.lastname as user_lastname', 'users.id_number',
            'purchase_details.article_name', 'purchase_details.purchased_amount', 'purchase_details.price',
            'articles.code')
                ->orderBy('order_number')->orderBy('user_name')
                ->where('purchases.verified_payment', 0)
                ->where('purchases.order_number', 'LIKE', '%'.$query1.'%')
                ->where('users.name', 'LIKE', '%'. $query2. '%')
                ->where('users.id_number', 'LIKE', '%'. $query3. '%')
                ->paginate(20);


                $aside_advertisings=AsideAdvertising::all();

        return view("seller.purchase.index", compact("purchases", "aside_advertisings", "query1", "query2", "query3"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_order(Request $request)
    {

        $purchased_amount=$request->get('purchased_amount');
        $id = Auth::id();
        $user=User::find($id);

        $article=Article::find($request->get('article_id'));

        $unit_price= ($article->price*100)/(100+$this->iva);
        $total_price=$purchased_amount * $unit_price ;
        $sub_total=$total_price;
        $iva=$sub_total * ($this->iva/100);
        $total=$sub_total+$iva;

        $total_price=number_format($total_price,2,",",".");
        $sub_total=number_format($sub_total,2,",",".");
        $iva=number_format($iva,2,",",".");
        $total=number_format($total,2,",",".");
        $unit_price=number_format($unit_price,2,",",".");

        $aside_advertisings=AsideAdvertising::all();
        return view("client.purchase.create_order", compact("user", "article", "purchased_amount", "total_price", "sub_total", "iva", "total", "aside_advertisings", "unit_price"));
    }

    public function order_shipped()
    {



        return view("client.purchase.create_order", compact("user", "article", "purchased_amount", "total_price", "sub_total", "iva", "total", "aside_advertisings"));
    }

    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_order_withdrawal(PurchaseStoreRequest $request)
    {
        $entrada=$request->only('requires_shipping');

        $id = Auth::id();
        $entrada['user_id'] = $id;

        $order=Purchase::all()->last();
        if($order){$order_number=$order->order_number + 1;}
        else{$order_number=1;}
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

        $aside_advertisings=AsideAdvertising::all();
        return view("client.purchase.order_shipped", compact("order_number", "aside_advertisings"));

    }

    public function store_order_courier(PurchaseCourierRequest $request)
    {
        $entrada=$request->only('requires_shipping', 'courier_name',
    'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip_code');

        $id = Auth::id();
        $entrada['user_id'] = $id;

        $order=Purchase::all()->last();
        if($order){$order_number=$order->order_number + 1;}
        else{$order_number=1;}
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

        $aside_advertisings=AsideAdvertising::all();
        return view("client.purchase.order_shipped", compact("order_number", "aside_advertisings"));

    }

    public function store_order_address(PurchaseAddressRequest $request)
    {
        $entrada=$request->only('requires_shipping', 'courier_name');

        $id = Auth::id();
        $entrada['user_id'] = $id;

        $user=User::find($id);
        $entrada['shipping_address']=$user->address;
        $entrada['shipping_city']=$user->city;
        $entrada['shipping_state']=$user->state;
        $entrada['shipping_zip_code']=$user->zip_code;


        $order=Purchase::all()->last();
        if($order){$order_number=$order->order_number + 1;}
        else{$order_number=1;}
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

        $aside_advertisings=AsideAdvertising::all();
        return view("client.purchase.order_shipped", compact("order_number", "aside_advertisings"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $purchase=Purchase::find($id);

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;
        $article=$purchase_detail->article;

        $article_code=$article->code;

        $unit_price= ($purchase_detail->price*100)/(100+$purchase_detail->iva);
        $total_price=$purchase_detail->purchased_amount * $unit_price ;
        $sub_total=$total_price;
        $iva=$sub_total * ($purchase_detail->iva/100);
        $total=$sub_total+$iva;

        $total_price=number_format($total_price,2,",",".");
        $sub_total=number_format($sub_total,2,",",".");
        $iva=number_format($iva,2,",",".");
        $total=number_format($total,2,",",".");
        $unit_price=number_format($unit_price,2,",",".");

        $created_at=Carbon::parse($purchase->created_at)->format('d-m-Y');

        $price=number_format($article->price,2,",",".");
        $aside_advertisings=AsideAdvertising::all();

        if($purchase->requires_shipping == 0){
            return view("seller.purchase.show_order_withdrawal_store", compact("purchase", "user", "article_code", "purchase_detail","unit_price", "total_price", "sub_total", "iva", "total", "aside_advertisings", "created_at"));
        }
        elseif($purchase->requires_shipping == 1){
        return view("seller.purchase.show_order_sent_courier_office", compact("purchase", "user", "article_code", "purchase_detail","unit_price", "total_price", "sub_total", "iva", "total", "aside_advertisings", "created_at"));
       }
        elseif($purchase->requires_shipping == 2){
        return view("seller.purchase.show_order_sent_address", compact("purchase", "user", "article_code", "purchase_detail","unit_price", "total_price", "sub_total", "iva", "total", "aside_advertisings", "created_at"));
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $purchase=Purchase::find($id);

        $purchase_detail=$purchase->purchase_details->first();

        $user=$purchase->user;
        $article=$purchase_detail->article;

        $article_code=$article->code;

        $unit_price= ($purchase_detail->price*100)/(100+$purchase_detail->iva);
        $total_price=$purchase_detail->purchased_amount * $unit_price ;
        $sub_total=$total_price;
        $iva=$sub_total * ($purchase_detail->iva/100);
        $total=$sub_total+$iva;

        $total_price=number_format($total_price,2,",",".");
        $sub_total=number_format($sub_total,2,",",".");
        $iva=number_format($iva,2,",",".");
        $total=number_format($total,2,",",".");
        $unit_price=number_format($unit_price,2,",",".");

        $aside_advertisings=AsideAdvertising::all();

        return view("seller.purchase.edit", compact("purchase", "user", "article_code", "purchase_detail","unit_price", "total_price", "sub_total", "iva", "total", "aside_advertisings"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_withdrawal_store(PurchaseStoreRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);

        $entrada->update($request->only('requires_shipping'));

        return redirect()->route('purchase.index', $entrada->id)->with('info', 'el articulo fue actualizado');
    }

    public function update_sent_courier(PurchaseCourierRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);

        $entrada->update($request->only('requires_shipping', 'courier_name', 'shipping_address',
        'shipping_city', 'shipping_state', 'shipping_zip_code'));

        return redirect()->route('purchase.index', $entrada->id)->with('info', 'el articulo fue actualizado');
    }

    public function update_sent_address(PurchaseCourierRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);

        $entrada->update($request->only('requires_shipping', 'courier_name', 'shipping_address',
        'shipping_city', 'shipping_state', 'shipping_zip_code'));

        return redirect()->route('purchase.index', $entrada->id)->with('info', 'el articulo fue actualizado');
    }

    public function update_sent_address_new(PurchaseAddressRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);

            $user=User::find($id);
            $entrada['shipping_address']=$user->address;
            $entrada['shipping_city']=$user->city;
            $entrada['shipping_state']=$user->state;
            $entrada['shipping_zip_code']=$user->zip_code;

        $entrada->update($request->only('requires_shipping', 'courier_name', 'courier_office', 'shipping_address',
        'shipping_city', 'shipping_state', 'shipping_zip_code'));

        return redirect()->route('purchase.index', $entrada->id)->with('info', 'el articulo fue actualizado');
    }

    public function update_payment(PurchasePaymentRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);


        $entrada->update($request->only('payment_type', 'amount_paid', 'issuing_bank',
        'receiving_bank', 'payment_day','operation_number'));


        return redirect()->route('purchase.index', $entrada->id)->with('info', 'los datos del pago fueron actualizados');
    }

    public function update_verified_payment(PurchasePaymentVerifiedRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);


       /* if(!$purchase->payment_type){
            return redirect()->route('seller.purchase', $purchase->id)->with('info', 'los datos del pago estan incompletos');
            }*/

        $entrada->update($request->only('verified_payment'));


      /*  return redirect()->route('purchase.index', $entrada->id)->with('info', 'el pago fue verificado');*/
    }

    public function update_invoice(PurchasePaymentVerifiedRequest $request, $id)
    {
        $entrada=Purchase::findOrfail($id);
        $purchase=Purchase::findOrfail($id);

        if(!$purchase->verified_payment){
            return redirect()->route('seller.purchase', $purchase->id)->with('info', 'el pago no ha sido confirmado');
            }

        $entrada->update($request->only('invoice_number'));

        return redirect()->route('purchase.index', $entrada->id)->with('info', 'la orden ha sido completada');
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
        return redirect()->route('purchase.index')->with('info', 'el articulo fue eliminado');
    }
}
