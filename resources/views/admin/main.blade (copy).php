<style>
    .centrar {
        margin-left: auto;
        margin-right: auto;
    }

    .centrar1 {
        margin-left: 40%;
        margin-right: ;
    }

    .centrar2 {
        margin-left: 8%;
        margin-right:
    }

    .centrar3 {
        margin-left: 11%;
        margin-right:
    }

</style>

@extends('admin.layout')
@section('content')

<div class="container-fluid">

    <h2 class="text-center">ADMINISTRACION </h2>

    <br>

    <div>
        <h3 class="text-center">ADMINISTRACION DE LOS DEPARTAMENTOS</h3>
        <div class="centrar1 ">
            <a href="/admin/department/create" type="button" class="btn btn-primary">registrar un departamento</a>
            <a href="/admin/department" type="button" class="btn btn-primary centrar2">ver departamentos</a>
        </div>
    </div>
    <br><br>
    <div>
        <h3 class="text-center">ADMINISTRACION DE LAS SECCIONES</h3>
        <div class="centrar1 ">
            <a href="/admin/section/create" type="button" class="btn btn-primary">registrar una nueva seccion</a>
            <a href="{{route('section.index')}}" type="button" class="btn btn-primary centrar2">ver secciones</a>
        </div>
    </div>

    <br><br>

    <div>
        <h3 class="text-center">ADMINISTRACION DE LAS CATEGORIAS</h3>
        <div class="centrar1 ">
            <a href="/admin/category/select-department" type="button" class="btn btn-primary">registrar una nueva categoria</a>
            <a href="{{route('category.index')}}" type="button" class="btn btn-primary centrar2">ver categorias</a>
        </div>
    </div>

    <br><br>

    <div>
        <h3 class="text-center">ADMINISTRACION DE LOS ARTICULO</h3>
        <div class="centrar1 ">
            <a href="/admin/article/select-department" type="button" class="btn btn-primary">registrar un nuevo articulo</a>
            <a href="{{route('article.index')}}" type="button" class="btn btn-primary centrar2">ver articulos</a>
        </div>
    </div>

    <div>
        <h3 class="text-center">ADMINISTRACION DE USUARIOS</h3>
        <div class="centrar1 ">
            <a href="{{route('user.index')}}" type="button" class="btn btn-primary centrar2">ver usuarios</a>
        </div>
    </div>

    <div>
        <h3 class="text-center">ADMINISTRACION DE LOS ROLES</h3>
        <div class="centrar1 ">
            <a href="{{route('role.index')}}" type="button" class="btn btn-primary centrar2">ver roles</a>
        </div>
    </div>


    @endsection
