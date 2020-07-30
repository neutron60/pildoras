@extends('seller.layout')
@section('content')

<h2 class="text-center">DETALLE DE LA VENTA</h2>
<br>

<div class="form-row float-right mr-5">
    <div class="">
        <label class="" for="nombre">
            <h5>fecha: </h5>
        </label>
    </div>
    <div class="">
        <label class="ml-2" for="nombre">
            <h5>{{$created_at}}</h5>
        </label>
    </div>
</div>
<div class="clearfix"></div>

<div class=" form-row float-right mr-5">
    <div class="">
        <label class=" " for="nombre">
            <h5>numero de factura:</h5>
        </label>
    </div>
    <div class="">
        <label class="ml-2 " for="nombre">
            <h5>{{$purchase->invoice_number}}</h5>
        </label>
    </div>
</div>
<br>

@include('seller.purchase.basic_order')



<!----------------------------------------------------------------------------->


<br>

@include('seller.purchase.basic_order_shipping_information')

<br>


<!----------------------------------------------------------------------------->

@include('seller.purchase.show_order_payment_details')

<br>
<a class="btn btn-primary" href="{{URL::previous()}}">retornar</a>


@endsection
