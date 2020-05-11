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
        <div class="col-md-2">
            <label class=" " for="name">
                <h5>SECCION:</h4>
            </label>
        </div>
        <div class="col-md-3 ">
            <label for="">{{$section->name}}</label>
        </div>
    </div>
    <br>
    @include('admin.section.fragment.info')
    <div class=" col-md-6 centrar form-row">
        <div class="col-md-3">
            <label class=" " for="name">
                <h5>CATEGORIA:</h5>
            </label>
        </div>
        <div class="col-md-3 ">
            <label for="">{{$category->name}}</label>
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
    <div class="col-md-6 form-row  centrar">
        <div class="col-md-1">
            <label for="">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$category->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
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
