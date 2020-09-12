
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR ENCABEZADOS PAGINA PRINCIPAL</h2>
    </div>
    <br>
    <form action="/admin/advertising" method="POST" enctype="multipart/form-data" novalidate="">
        @csrf

        <div class="form-row">
            <div class="">
                <label class="" for="nombre">LOGO:</label>
            </div>
            <div class="ml-3">
                <input type="file" maxlength="100" pattern="" class=" " id="logo" name="logo">
                @include('admin.advertising.fragment.error_logo')
            </div>
        </div>
<br>
        <div class="form-row">
            <div class="">
                    <label>ENCABEZADO PRINCIPAL:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="advertising_header" name="advertising_header"
                    value="{{old('advertising_header')}}" size="50">
            </div>
        </div>
        <br>

        <div class="form-row">
            <div class="">
                <label class="" for="nombre">ENCABEZADO OFERTAS:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="bargain_header" name="bargain_header"
                    value="{{old('bargain_header')}}" size="50">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">ENCABEZADO NUEVOS PRODUCTOS:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="new_collection_header" name="new_collection_header"
                value="{{old('new_collection_header')}}"size="50" >
            </div>
        </div>
        <br><br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">IMAGEN ENCABEZADO:</label>
            </div>
            <div class="ml-3">
                <input type="file" maxlength="100" pattern="" class=" " id="image_header" name="image_header">
                @include('admin.advertising.fragment.error_image_header')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">QUIENES SOMOS:</label>
            </div>
            <div class="ml-3 col-md-3">
                <textarea maxlength="2000" rows="10" cols="10" pattern="" class="form-control" id="who_are"
                    name="who_are">{{old('who_are')}} </textarea>
                @include('admin.advertising.fragment.error_who_are')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">CONTACTANOS:</label>
            </div>
            <div class="ml-3 col-md-3">
                <textarea maxlength="2000" rows="10" cols="10" pattern="" class="form-control" id="contact"
                    name="contact">{{old('contact')}} </textarea>
                @include('admin.advertising.fragment.error_contact')
            </div>
        </div>
        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="enviar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">

        </div>
    </form>
</div>
@endsection
