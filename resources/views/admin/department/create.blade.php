
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UN NUEVO DEPARTAMENTO</h2>
    </div>
    <br>
    <form action="/admin/department" method="POST" enctype="multipart/form-data" novalidate="" id="validar_forma2">
        @csrf

        <!-- DEPARTAMENTO -->

        <div class="form-row">
            <div class="">
                <label class=" " for="name">
                    <h5>DEPARTAMENTO:</h5>
                </label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="40" pattern="" class="form-control" id="name" name="name"
                    value="{{old('name')}}">
                @include('admin.department.fragment.error_name')
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="">
                <label class="" for="nombre">TITULO:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="40" pattern="" class="form-control" id="title" name="title"
                    value="{{old('title')}}">
                @include('admin.department.fragment.error_title')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="col-md-3 ml-3">
                <textarea maxlength="200" rows="8" cols="8" pattern="" class="form-control" id="description"
                    name="description">{{old('description')}} </textarea>
                @include('admin.department.fragment.error_description')
            </div>
        </div>
        <br><br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <div class="ml-3">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image" name="image">
                @include('admin.department.fragment.error_image')
            </div>
        </div>
        <input type="hidden" class=" " id="is_active" name="is_active" value="1">
        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="enviar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">

        </div>
    </form>
</div>
@endsection
