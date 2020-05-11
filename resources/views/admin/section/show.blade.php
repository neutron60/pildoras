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
    <!-- SECCION -->

    <div class=" col-md-6 centrar form-row">
        <div class="col-md-3">
            <label class=" " for="name">
                <h5>DEPARTAMENTO:</h4>
            </label>
        </div>
        <div class="col-md-3 ">
            <label for="">{{$department->name}}</label>
        </div>
        <br> <br>
    </div>
    @include('admin.section.fragment.info')
    <div class=" col-md-6 centrar form-row">
        <div class="col-md-2">
            <label class=" " for="name">
                <h5>SECCION:</h5>
            </label>
        </div>
        <div class="col-md-3 ">
            <label for="">{{$section->name}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-5 form-row  centrar">
        <div class="col-md-2">
            <label for="is_active">ESTADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$is_active}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-8 form-row  centrar">
        <div class="col-md-1">
            <label for="">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$section->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$section->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class="">
        <a href="{{route('section.edit', $section->id)}}" class="btn btn-primary centrar1" name="editar" id="">editar seccion
        </a>
        <a class="btn btn-primary centrar2" href="{{route('section.index')}}">ver secciones </a>
    </div>

</div>
@endsection
