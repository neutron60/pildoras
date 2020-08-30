@extends('seller.layout')
@section('content')

<h2 class="text-center">ORDEN DE COMPRA - ASIGNAR FACTURA</h2>
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
            <h5>numero de orden:</h5>
        </label>
    </div>
    <div class="">
        <label class="ml-2 " for="nombre">
            <h5>{{$purchase->order_number}}</h5>
        </label>
    </div>
</div>
<br>

@include('seller.purchase.basic_order')

<div class=" form-row ">
    <div class="">
        <label class="ml-3 " for="nombre">
            <h5>TIPO DE RETIRO:  {{$require_shipping}}</h5>
        </label>
    </div>
</div>




<br>
<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>DATOS DE LA FACTURA:</h5>
        </label>
    </div>
</div>
<form action="/seller/purchase/update-order-assign-invoice/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
    novalidate="novalidate" id="validar_forma">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">numero de factura:</label>
        </div>
        <div class="ml-3">
            <input type="text" maxlength="20" pattern="" class="form-control required" id="invoice_number" name="invoice_number"
                value="{{$purchase->invoice_number}}">
                @include('seller.purchase.fragment.error_invoice_number')
        </div>
    </div>
    <br>
    <button type="submit" class="ml-5">GUARDAR</button>
</form>


<br><br>

<div class="form-row ">
    <a class="btn btn-primary" href="{{URL::previous()}}">retornar</a>
</div>








@endsection
