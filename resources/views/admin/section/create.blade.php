@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UN NUEVA SECCION</h2>
    </div>
    <br>
    <form action="/admin/section" method="POST" enctype="multipart/form-data" novalidate="">
        @csrf
        <!-- SECCION -->

        <div class=" col-md-6 centrar form-row">
            <div class="col-md-4">
                <h5 class=""> DEPARTAMENTO:</h5>
            </div>
            <div class="col-md-6 ">
                <select name="department_id" id="department_id" class="form-control">
                    <option selected value="">seleccione</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @include('admin.section.fragment.error_department_id')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-5">
                <label class=" " for="name">
                    <h5>SECCION:</h5>
                </label>
            </div>
            <div class="col-md-7 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="name" name="name"
                    value="{{old('name')}}">
                @include('admin.section.fragment.error_name')
            </div>
        </div>
        <br><br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">TITULO:</label>
            </div>
            <div class="col-md-8 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="title" name="title"
                    value="{{old('title')}}">
                @include('admin.section.fragment.error_title')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="col-md-8 ">
                <textarea maxlength="200" rows="10" cols="10" pattern="" class="form-control" id="description"
                    name="description">{{old('description')}} </textarea>
                @include('admin.section.fragment.error_description')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">CATEGORIA:</label>
            </div>
            <div class="col-md-8 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="title" name="category"
                    value="{{old('category')}}">
                    @include('admin.section.fragment.error_category')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <div class="col-md-8 ">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image" name="image">
                @include('admin.section.fragment.error_image')
            </div>
            <input type="hidden" value="activo" id="status" name="status">
        </div>
        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="registrar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">
            <button class="centrar2"><a class="" href="/admin/main"> menu principal </a></button>
        </div>
    </form>
</div>
@endsection
