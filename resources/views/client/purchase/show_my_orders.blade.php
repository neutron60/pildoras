@extends('client.layout')
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

@include('seller.purchase.basic_order')

<div class=" form-row ">
    <div class="">
        <label class="ml-3 " for="nombre">
            <h4>TIPO DE RETIRO: {{$message}}</h4>
        </label>
    </div>
</div>
<br>

<!------------------------------------------------------------------------------>
    @if($purchase->requires_shipping == 0)

    <h5>LA MERCANCIA SE RETIRARA EN LA TIENDA</h5>



@elseif($purchase->requires_shipping == 1 || $purchase->requires_shipping == 2)

@include('seller.purchase.basic_order_shipping_information')


@endif

<br><br>
<!----------------------------------------------------------------------------->


<a class="btn btn-primary" href="{{URL::previous()}}">retornar</a>


@endsection
