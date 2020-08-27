
@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <div class="">
            <h2 class="text-center">EDICION DE LA PUBLICIDAD LATERAL</h2>
        </div>
        <br>

        <form action="/admin/aside-advertising/{{$aside_advertising->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate" id="validar_forma">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="media ">
                <img src="{{asset($aside_advertising->advertising_image)}}" class="mr-3 col-4 col-md-3 col-lg-4 col-xl-3 image5" alt="imagen" height="150 rem">
                <div class="col-8 col-md-9 col-lg-8 col-xl-9">
                    <input type="file" maxlength="100" pattern="" class="mt-3 " id="advertising_image" name="advertising_image"
                        value="{{asset($aside_advertising->advertising_image)}}">

                    <div class="media-body mt-3">
                        <label for="">Texto:</label>
                        <input type="text" maxlength="400" pattern="" class="form-control required" id="advertising_text" name="advertising_text"
                            value="{{$aside_advertising->advertising_text}}" size="200">
                            @include('admin.aside-advertising.fragment.error_advertising_text')
                            <br>
                        <label for="" class="mt-3">Direccion URL:</label>
                        <input type="url" maxlength="400" pattern="" class="form-control required" id="advertising_url" name="advertising_url"
                            value="{{$aside_advertising->advertising_url}}">
                            @include('admin.aside-advertising.fragment.error_advertising_url')
                    </div>
                </div>
            </div>
            <br>
            <div class="centrar1">
                <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
                <a class="btn btn-secondary centrar2" href="{{route('aside-advertising.index')}}">ver publicidades </a>
            </div>
        </form>
        <br><br>
        <div class="centrar1">
            <form action="/admin/aside-advertising/{{$aside_advertising->id}}" method="POST" enctype="multipart/form-data"
                novalidate="novalidate">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" name="eliminar publicidad" value="eliminar publicidad" id="confirmar_borrar" class="btn btn-secondary">
                <!--el metodo es exigido por destroy-->
            </form>
        </div>
    </div>

    @endsection





