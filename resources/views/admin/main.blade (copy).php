@extends('admin.layout')
@section('content')



<h2 class="text-center">ADMINISTRACION </h2>

<br>

<div>
    <h3 class="text-center">ADMINISTRACION DE LOS DEPARTAMENTOS</h3>
    <div class="">
        <a href="/admin/department/create" type="button" class="btn btn-primary">registrar un departamento</a>
        <a href="/admin/department" type="button" class="btn btn-primary centrar2">ver departamentos</a>
    </div>
</div>
<br><br>
<div>
    <h3 class="text-center">ADMINISTRACION DE LAS SECCIONES</h3>
    <div class="">
        <a href="/admin/section/create" type="button" class="btn btn-primary">registrar una nueva seccion</a>
        <a href="{{route('section.index')}}" type="button" class="btn btn-primary centrar2">ver secciones</a>
    </div>
</div>

<br><br>

<div>
    <h3 class="text-center">ADMINISTRACION DE LAS CATEGORIAS</h3>
    <div class="">
        <a href="/admin/category/select-department" type="button" class="btn btn-primary">registrar una nueva
            categoria</a>
        <a href="{{route('category.index')}}" type="button" class="btn btn-primary centrar2">ver categorias</a>
    </div>
</div>
<br>
<div>
    <h3 class="text-center">ADMINISTRACION DE LOS ARTICULO</h3>
    <div class="">

        <a href="{{route('article.index')}}" type="button" class="btn btn-primary centrar2">ver articulos</a>
        <a href="/admin/article/select-department" type="button" class="btn btn-primary">registrar un nuevo articulo</a>
    </div>
</div>

<br><br>

<div>
    <h3 class="text-center">ADMINISTRACION DE USUARIOS</h3>
    <div class="">
        <a href="{{route('user.index')}}" type="button" class="btn btn-primary centrar2">ver usuarios</a>
    </div>
</div>

<div>
    <h3 class="text-center">ADMINISTRACION DE LOS ROLES</h3>
    <div class="">
        <a href="{{route('role.index')}}" type="button" class="btn btn-primary centrar2">ver roles</a>
    </div>
</div>

<div>
    <h3 class="text-center">ASIDE DERECHO</h3>
    <div class="">
        <a href="/admin/aside-advertising/create" type="button" class="btn btn-primary">registrar un nueva
            publicidad</a>
        <a href="/admin/aside-advertising" type="button" class="btn btn-primary centrar2">ver publicidad</a>
    </div>
</div>

<div>
    <h3 class="text-center">PAGINA CENTRAL</h3>
    <div class="">

        <a href="/admin/advertising" type="button" class="btn btn-primary centrar2">ver publicidad</a>
    </div>



    @endsection
