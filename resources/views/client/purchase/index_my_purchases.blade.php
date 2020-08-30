@extends('client.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5">MIS COMPRAS</h1>
    @if($purchases->count() == 0)
    <h2>No ha realizado compras</h2>
    <br>
    <h2>Lo invitamos a visitar nuestros articulos en venta</h2>
    @else


    <form action="/client/purchase/index-search-my-purchases" class="form-inline mt-n3">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control form-control-navbar col-md-2" name="search_order"
                placeholder="# orden" aria-label="Search" size="50px" value="">
            <input type="search" class="form-control form-control-navbar col-md-2 ml-2" name="search_article"
                placeholder="article" aria-label="Search" size="50px" value="">

            <div class="input-group-append ">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"> </i>
                </button>
            </div>
        </div>
    </form>
    <br>

    @if($query1 <> '%')
        <p>Resultado de la busqueda del numero de orden {{$query1}} </p>
        @endif
        @if($query2 <> '%')
            <p>Resultado de la busqueda del nombre {{$query2}} </p>
            @endif


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
                                    href="/client/purchase/show-my-purchase/{{$purchase->id}}"> ver
                                    compra</a> </button></td>
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
