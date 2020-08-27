
@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-5"> PUBLICIDAD LATERAL</h1>

    @include('admin.department.fragment.info')
    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Texto:</th>
                <th class="text-center" scope="col">Imagen:</th>
                <th class="text-center" scope="col">URL:</th>
                <th class="text-center" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($aside_advertisings as $aside_advertising)
            <tr>
                <td class="text-center" scope="row" width="300px" padding-top="10%" >{{$aside_advertising->advertising_text}}</td>

                <td class="" width="150px"><img src="{{asset($aside_advertising->advertising_image)}}" class="centrar image5" alt="imagen" height="140 rem"></td>

                <td class="text-center" width="100px">{{$aside_advertising->advertising_url}}</td>

                <td class="text-center" width="100px"> <button type="button" class="btn btn-default"> <a href="{{route('aside-advertising.show', $aside_advertising->id)}}"> ver
                        datos publicidad</a></button></td>
                <td class="text-center" width="100px"> <button type="button" class="btn btn-default"><a href="{{route('aside-advertising.edit', $aside_advertising->id)}}">
                        editar</a></button></td>
            </tr>
            @endforeach



        </tbody>
    </table>



</div>

@endsection
