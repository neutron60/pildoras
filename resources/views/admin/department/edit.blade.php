<style>

.imagen {
        padding-right: ;
        padding-left: ;
        padding-top: ;
        padding-bottom: ;
        height: 200px;
        margin-left: ;
        width: 100%
    }
</style>

@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDICION DE UN DEPARTAMENTO</h2>
    </div>

    <br>
    <form action="/admin/department/{{$department->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- DEPARTAMENTO -->
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-5">
                <label class=" " for="name">
                    <h5>DEPARTAMENTO:</h5>
                </label>
            </div>
            <div class="col-md-7 ">
              <label for="">{{$department->name}}</label>
            </div>
        </div>
        <br><br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">TITULO:</label>
            </div>
            <div class="col-md-8 ">
                <input type="text" maxlength="40" pattern="" class="form-control" id="name" name="title"
                    value="{{$department->title}}">
                @include('admin.department.fragment.error_title')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="col-md-8 ">
                <textarea maxlength="50" rows="5" cols="8" pattern="" class="form-control" id="description"
                    name="description">{{$department->description}} </textarea>
                @include('admin.department.fragment.error_description')
            </div>
        </div>
        <br>
        <div class="col-md-5 form-row  centrar">
            <div class="col-md-4">
                <label for="is_active">ESTADO</label>
            </div>
            <div class="col-md-4">
                <select name="is_active" id="is_active" class="form-control">
                    <option selected value="{{$department->is_active}}">{{$is_active}}</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                </select>
            </div>
        </div>
        <br><br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-2">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <div class="col-md-6 ">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image" name="image">
                <br><br>
                <img class="imagen" src="{{$department->image}}" alt="imagen" />
                @include('admin.department.fragment.error_image')
            </div>
        </div>
        <br><br>
        <div class="centrar1">
            <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
            <a class="btn btn-secondary centrar2" href="{{route('department.index')}}">ver departamentos </a>
        </div>
    </form>
    <br>
    <div class="centrar1">
        <form action="/admin/department/{{$department->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="eliminar departamento" value="eliminar departamento" id="" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>
</div>
@endsection