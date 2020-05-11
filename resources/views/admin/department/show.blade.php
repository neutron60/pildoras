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
            <label for="">{{$department->title}}</label>
        </div>
    </div>
    <br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">DESCRIPCION:</label>
        </div>
        <div class="col-md-8 ">
            <label class="" for="nombre">{{$department->description}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-5 form-row  centrar">
        <div class="col-md-4">
            <label for="is_active">ESTADO:</label>
        </div>
        <div class="col-md-4">
            <label for="">{{$is_active}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-6 form-row  centrar">
        <div class="col-md-2">
            <label for="">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$department->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$department->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-2">
            <label class="" for="nombre">IMAGEN:</label>
        </div>
        <div class="col-md-6 ">
            <img class="imagen" src="{{$department->image}}" alt="imagen" />
        </div>
    </div>
    <br><br>
    <div class="">
        <a href="{{route('department.edit', $department->id)}}" class="btn btn-primary centrar1" name="editar"
            id="">editar </a>
        <a class="btn btn-primary centrar2" href="{{route('department.index')}}">ver departamentos </a>
    </div>

</div>
@endsection
