@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDICION DE ENCABEZADOS PAGINA PRINCIPAL</h2>
    </div>
    <br>
    <form action="/admin/advertising/{{$advertising->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-row">
            <div class="col-2 col-md-1">
                <label class="" for="nombre">LOGO:</label>
            </div>
            <div class="ml-3 col-3 col-md-2">
                <input type="file" maxlength="100" pattern="" class="" id="logo" name="logo">
                <br><br>
                <img class="image5 img-responsive" src="{{asset($advertising->logo)}}" alt="imagen" />
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label>ENCABEZADO PRINCIPAL:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="advertising_header"
                    name="advertising_header" value="{{$advertising->advertising_header}}" size="50">
            </div>
        </div>
        <br>

        <div class="form-row">
            <div class="">
                <label class="" for="nombre">ENCABEZADO OFERTAS:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="bargain_header"
                    name="bargain_header" value="{{$advertising->bargain_header}}" size="50">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">ENCABEZADO NUEVOS PRODUCTOS:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="new_collection_header"
                    name="new_collection_header" value="{{$advertising->new_collection_header}}" size="50">
            </div>
        </div>
        <br><br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <div class="ml-3 ">
                <input type="file" maxlength="100" pattern="" class=" " id="image_header" name="image_header">
                <br><br>
                <img class=" col-7 image5" src="{{asset($advertising->image_header)}}" alt="imagen" height=150px />

            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">QUIENES SOMOS:</label>
            </div>
            <div class="ml-3">
                <textarea maxlength="2000" rows="20" cols="80" pattern="" class="form-control" id="who_are"
                    name="who_are">{{$advertising->who_are}} </textarea>
                @include('admin.advertising.fragment.error_who_are')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">CONTACTANOS:</label>
            </div>
            <div class="ml-3">
                <textarea maxlength="2000" rows="20" cols="80" pattern="" class="form-control" id="contact"
                    name="contact">{{$advertising->contact}} </textarea>
                @include('admin.advertising.fragment.error_contact')
            </div>
        </div>
        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="enviar" value="actualizar" id="">
            <a class="btn btn-outline-dark ml-5" href="{{URL::previous()}}">retornar</a>

        </div>
    </form>
</div>
@endsection
