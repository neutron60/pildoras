@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5"> ORDENES </h1>

    <form action="/seller/purchase/search-order" class="form-inline mt-n3">
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
                            <th class="text-center" scope="col">comprador</th>
                            <th class="text-center" scope="col">cedula</th>
                            <th class="text-center" scope="col">codigo</th>
                            <th class="text-center" scope="col">articulo</th>
                            <th class="text-center" scope="col">cantidad</th>
                            <th class="text-center" scope="col">precio</th>
                            <th class="text-center" colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($purchases as $purchase)
                        <tr>
                            <td class="text-center" scope="row" width="60px">{{$purchase->order_number}}
                            </td>

                            <td class="text-center" scope="row" width="120px">{{$purchase->user_name}}
                                {{$purchase->user_lastname}}</td>

                            <td class="text-center" scope="row" width="120px">{{$purchase->id_number}}</td>

                            <td class="text-center" scope="row" width="120px">{{$purchase->code}}</td>

                            <td class="text-center" scope="row" width="200px">{{$purchase->article_name}}
                            </td>

                            <td class="text-center" scope="row" width="80px">{{$purchase->purchased_amount}}
                            </td>

                            <td class="text-center" scope="row" width="80px">{{$purchase->price}}</td>

                            <td class="text-center" width="100px"><button type="button" class="btn btn-default"><a
                                        href="{{route('purchase.show', $purchase->id)}}"> ver
                                        orden</a> </button></td>
                            <td class="text-center" width="70px"><button type="button" class="btn btn-default"><a
                                        href="{{route('purchase.edit', $purchase->id)}}">
                                        editar orden</a> </button></td>
                        </tr>

                        @endforeach
                    </tbody>


                </table>
                {{$purchases->withQueryString()->links()}}
</div>


@endsection
