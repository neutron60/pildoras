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


<div class=" form-row ">
    <div class="">
        <label class="ml-3 " for="nombre">
            <h5>TIPO DE RETIRO:  retiro en tienda</h5>
        </label>
    </div>
</div>

<br>


<!----------------------------------------------------------------------------->

@include('seller.purchase.show_order_payment_details')
<br>

<a class="btn btn-secondary" href="{{route('purchase.index')}}">ver ordenes </a>


@endsection
