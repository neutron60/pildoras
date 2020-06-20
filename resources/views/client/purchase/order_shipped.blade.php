@extends('client.layout')
@section('content')

<h2 class="text-center">ORDEN DE COMPRA</h2>

<br><br><br><br><br>
<h4 class="text-center">Su orden ha sido enviada bajo el numero de orden</h4>
<h4 class="text-center" >{{$order_number}}</h4>
<h4 class="text-center">En su email recibira los detalles para el pago de su compra</h4>


<a href="/neutron" class="btn btn-primary" type="button"> seguir comprando </button></a>



@endsection
