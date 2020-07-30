@extends('seller.layout')
@section('content')

<h2 class="text-center">ORDEN DE COMPRA - VERIFICAR PAGO</h2>
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

@include('seller.purchase.show_order_payment_details')

<br>
<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>VERIFICACION DEL PAGO:</h5>
        </label>
    </div>
</div>
<form action="/seller/purchase/update-order-verified-payment/{{$purchase->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="ml-3">
        <label class="" for="nombre">pago verificado:</label>
    </div>
    <div class="ml-3 col-md-1">
        <select id="verified_payment" name="verified_payment" class="form-control" >
            <option selected value="{{$purchase->verified_payment}}">{{$purchase->verified_payment?'si':'no'}}</option>
            <option value="1">si</option>
            <option value="0">no</option>
        </select>
        @include('seller.purchase.fragment.error_verified_payment')
    </div>
<br>
    <button type="submit" class="ml-5">GUARDAR</button>
</form>

<br><br>

<div class="form-row ">
    <a class="btn btn-primary" href="{{URL::previous()}}">retornar</a>
<div class="ml-5">


        <!--el metodo es exigido por destroy-->
        <div class="ml-5">
            <form action="/seller/purchase/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
                novalidate="novalidate">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" name="eliminar orden" value="eliminar orden" id="" class="btn btn-secondary ml-5">
                <!--el metodo es exigido por destroy-->
            </form>
        </div>
    </form>
</div>
</div>


@endsection
