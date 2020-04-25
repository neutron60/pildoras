<style>
    .imagen {
        padding-right: ;
        padding-left: ;
        padding-top: ;
        padding-bottom: ;
        height: 140px;
        margin-left: ;
        width: 50%
    }

</style>

@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDICION DE UNA SECCION</h2>
    </div>

    <br>
    <form action="/admin/section/{{$section->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">


        <!--el metodo es exigido por update-->
        <!-- DEPARTAMENTO -->
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-5">
                <label class=" " for="name">
                    <h5>SECCION:</h5>
                </label>
            </div>
            <div class="col-md-7 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="name" name="name"
                    value="{{$section->name}}">
                @include('admin.section.fragment.error_name')
            </div>
        </div>
        <br><br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">TITULO:</label>
            </div>
            <div class="col-md-8 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="title" name="title"
                    value="{{$section->title}}">
                @include('admin.section.fragment.error_title')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">CATEGORIA:</label>
            </div>
            <div class="col-md-8 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="category" name="category"
                    value="{{$section->category}}">
                @include('admin.section.fragment.error_category')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="col-md-8 ">
                <textarea maxlength="150" rows="10" cols="10" pattern="" class="form-control" id="description"
                    name="description">{{$section->description}} </textarea>
                @include('admin.section.fragment.error_description')
            </div>
        </div>
        <br>
        <div class="col-md-5 form-row  centrar">
            <div class="col-md-4">
                <label for="status">ESTADO</label>
            </div>
            <div class="col-md-4">
                <select name="status" id="status" class="form-control">
                    <option selected value="{{$section->status}}">{{$section->status}}</option>
                    <option value="activo">activo</option>
                    <option value="inactivo">inactivo</option>
                </select>
            </div>
        </div>
        <br><br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <div class="col-md-8 ">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image" name="image">
                <img class="imagen" src="{{$section->image}}" alt="imagen" />
                @include('admin.section.fragment.error_image')
            </div>
        </div>
        <br><br>
        <div class="centrar1">
            <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
            <a class="btn btn-secondary centrar2" href="{{route('section.index')}}">ver secciones </a>
        </div>
    </form>
    <br>
    <div class="centrar1">
        <form action="/admin/section/{{$section->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="eliminar registro" value="eliminar registro" id="" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>
</div>
@endsection
