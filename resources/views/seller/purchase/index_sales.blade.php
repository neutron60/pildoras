@extends('seller.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5">VENTAS</h1>

    <form action="/seller/purchase/index-search-sales" class="form-inline mt-n3">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control form-control-navbar col-md-2" name="search_order"
                placeholder="# orden" aria-label="Search" size="50px" value="">
            <input type="search" class="form-control form-control-navbar col-md-2 ml-2" name="search_name"
                placeholder="nombre" aria-label="Search" size="50px" value="">
            <input type="search" class="form-control form-control-navbar col-md-2 ml-2" name="search_id_number"
                placeholder="# cedula" aria-label="Search" size="50px" value="">
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
            @if($query3 <> '%')
                <p>Resultado de la busqueda del numero de cedula {{$query3}} </p>
                @endif

                <table class="table-striped table-hover table-responsive ">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">orden</th>
                            <th class="text-center" scope="col">fecha</th>
                            <th class="text-center" scope="col">factura</th>
                            <th class="text-center" scope="col">comprador</th>
                            <th class="text-center" scope="col">cedula</th>
                            <th class="text-center" scope="col">nombre articulo</th>
                            <th class="text-center" colspan="1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($purchases as $purchase)
                        <tr>
                            <td class="text-center" scope="row" width="60px">{{$purchase->order_number}}</td>

                            <td class="text-center" scope="row" width="100px">{{$created_at[$purchase->id]}} </td>

                            <td class="text-center" scope="row" width="100px">{{$purchase->invoice_number}}</td>

                            <td class="text-center" scope="row" width="120px">{{$purchase->user_name}} {{$purchase->user_lastname}} </td>

                            <td class="text-center" scope="row" width="120px">{{$purchase->id_number}}</td>

                            <td class="text-center" scope="row" width="200px">{{$purchase->article_name}}
                            </td>

                            <td class="text-center" width="80px"><button type="button" class="btn btn-default"><a
                                        href="/seller/purchase/show-sales-detail/{{$purchase->id}}">  ver venta</a> </button></td>

                        </tr>

                        @endforeach
                    </tbody>


                </table>
                {{$purchases->withQueryString()->links()}}
                <br><br>
    <a class="btn btn-primary" href="/neutron/index"> retornar </a>
</div>



@endsection
