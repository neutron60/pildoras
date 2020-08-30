@extends('client.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5">MIS ORDENES</h1>

    @if($purchases->count() == 0)
    <h2>No tiene ordenes de compra pendientes</h2>
    <br>
    <h2>Lo invitamos a visitar nuestros articulos en venta</h2>
    @else

    <br>
    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" scope="col">orden</th>
                <th class="text-center" scope="col">fecha</th>
                <th class="text-center" scope="col">nombre articulo</th>
                <th class="text-center" scope="col">cantidad comprada</th>
                <th class="text-center" scope="col">precio</th>
                <th class="text-center" colspan="1">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($purchases as $purchase)
            <tr>
                <td class="text-center" scope="row" width="50px">{{$purchase->order_number}} </td>

                <td class="text-center" scope="row" width="120px">{{$created_at[$purchase->id]}}</td>

                <td class="text-center" scope="row" width="200px">{{$purchase->article_name}}</td>

                <td class="text-center" scope="row" width="80px">{{$purchase->purchased_amount}}</td>

                <td class="text-center" scope="row" width="80px">{{$purchase->price}}
                </td>

                <td class="text-center" width="80px"><button type="button" class="btn btn-default"><a
                            href="/client/purchase/show-my-orders/{{$purchase->id}}"> ver
                            orden</a> </button></td>
            </tr>

            @endforeach
        </tbody>


    </table>
    {{$purchases->withQueryString()->links()}}

    @endif
    <br><br>
    <a class="btn btn-primary" href="/neutron/index"> retornar </a>

</div>


@endsection
