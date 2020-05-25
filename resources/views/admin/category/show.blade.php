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
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label class=" " for="name">
                <h5>SECCION:</h4>
            </label>
        </div>
        <div class="ml-3">
            <label for="">{{$section->name}}</label>
        </div>
    </div>
    <br>
    @include('admin.section.fragment.info')
    <div class="form-row">
        <div class="">
            <label class=" " for="name">
                <h5>CATEGORIA:</h5>
            </label>
        </div>
        <div class="ml-3">
            <label for="">{{$category->name}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label for="is_active">ESTADO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$category->is_active?'activo':'inactivo'}}</label>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="">
            <label for="">CREADO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$category->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$category->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br> <br>
    <div class="">
        <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary centrar1" name="editar" id="">editar
            categoria
        </a>
        <a class="btn btn-primary centrar2" href="{{route('category.index')}}">ver categorias </a>
    </div>

</div>
@endsection
