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
        <h2 class="text-center">DATOS DEL DEPARTAMENTO</h2>
    </div>
    <br>
    <!-- DEPARTAMENTO -->
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-5">
            <label class=" " for="name">
                <h5>DEPARTAMENTO:</h5>
            </label>
        </div>
        <div class="col-md-7 ">
            <label for="">{{$departments->name}}</label>
        </div>
    </div>
    <br><br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">TITULO:</label>
        </div>
        <div class="col-md-8 ">
            <label for="">{{$departments->title}}</label>
        </div>
    </div>
    <br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">DESCRIPCION:</label>
        </div>
        <div class="col-md-8 ">
            <textarea name="" id="" cols="30" rows="10">{{$departments->description}}</textarea>
        </div>
    </div>
    <br>
    <div class="col-md-5 form-row  centrar">
        <div class="col-md-4">
            <label for="status">ESTADO:</label>
        </div>
        <div class="col-md-4">
            <label for="">{{$departments->status}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-6 form-row  centrar">
        <div class="col-md-2">
            <label for="status">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$departments->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="status">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$departments->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">IMAGEN:</label>
        </div>
        <div class="col-md-8 ">
            <img class="imagen" src="{{$departments->image}}" alt="imagen" />
        </div>
    </div>
    <br><br>
    <div class="">
        <a href="{{route('department.edit', $departments->id)}}" class="btn btn-primary centrar1" name="editar"
            id="">editar </a>
        <a class="btn btn-primary centrar2" href="{{route('department.index')}}">ver departamentos </a>
    </div>
    </form>
</div>
@endsection
