@extends('seller.layout')
@section('content')

<h2 class="text-center">ORDEN DE COMPRA</h2>
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

@include('client.purchase.basic_order')



<!----------------------------------------------------------------------------->

<div class="form-row ">
    <div class="ml-3">
        <h5>TIPO DE RETIRO:</h5>
    </div>

    <div class="ml-3">
        <label class='ml-3' for="">envio a oficina de correo</label>
    </div>
</div>
<br>
<div class=" form-row ">
    <div class="ml-3">
        <label class=" " for="nombre">
            <h5>DATOS DE ENVIO:</h5>
        </label>
    </div>
</div>
<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">enviar a:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->name}} {{$user->lastname}}</label>
    </div>
    <div class="ml-3">
        <label class="" for="nombre">cedula:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->id_type}} - {{$user->id_number}}</label>
    </div>
</div>
<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">telf. fijo:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->area_code}} {{$user->phone_number}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">telf. celular:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->mobil_phone_code}} {{$user->mobil_phone}}</label>
    </div>
</div>

    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">empresa de envio:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$purchase->courier_name}}</label>
        </div>
    </div>

    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">Direccion de la oficina de correo:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_address}}</label>
        </div>
    </div>

    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">Ciudad:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_city}}</label>
        </div>
        <div class="ml-5">
            <label class="" for="nombre">estado:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_state}}</label>
        </div>
        <div class="ml-5">
            <label class="" for="nombre">Codigo postal:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_zip_code}}</label>
        </div>
    </div>
<br><br>

<!----------------------------------------------------------------------------->

@include('seller.purchase.show_order_payment_details')


<a class="btn btn-secondary" href="{{route('purchase.index')}}">ver ordenes </a>


@endsection
