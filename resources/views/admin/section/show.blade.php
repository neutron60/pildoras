
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <!-- SECCION -->

    <div class="form-row">
        <div class="">
            <label class=" " for="name">
                <h5>DEPARTAMENTO:</h4>
            </label>
        </div>
        <div class="ml-3">
            <label for="">{{$department->name}}</label>
        </div>
        <br> <br>
    </div>
    @include('admin.section.fragment.info')
    <div class="form-row">
        <div class="">
            <label class=" " for="name">
                <h5>SECCION:</h5>
            </label>
        </div>
        <div class="ml-3">
            <label for="">{{$section->name}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label for="is_active">ESTADO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$section->is_active?'activo':'inactivo'}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label for="">CREADO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$section->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="ml-3">
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
