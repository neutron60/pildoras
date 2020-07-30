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

    @include('admin.department.fragment.info')
    <br>
    <div class="form-row">
        <div class="">
            <label class=" " for="name">
                <h5>DEPARTAMENTO:</h5>
            </label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$department->name}}</label>
        </div>
    </div>
    <br><br>
    <div class=" form-row">
        <div class="">
            <label class="" for="nombre">TITULO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$department->title}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label class="" for="nombre">DESCRIPCION:</label>
        </div>
        <div class="ml-3">
            <label class="" for="nombre">{{$department->description}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label for="is_active">ESTADO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$department->is_active?'activo':'inactivo'}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label for="">CREADO:</label>
        </div>
        <div class="ml-2">
            <label for="">{{$department->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="ml-5">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="ml-2">
            <label for="">{{$department->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class="form-row">
        <div class="">
            <label class="" for="nombre">IMAGEN:</label>
        </div>
        <div class="col-md-3 ">
            <img class="image" src="{{asset($department->image)}}" alt="imagen" height=150px/>
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
