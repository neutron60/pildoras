
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UNA NUEVA CATEGORIA</h2>
    </div>
    <br>
    <form action="/admin/category" method="POST" enctype="multipart/form-data" novalidate="">
        @csrf

        <!-- SECCION -->


        <div class=" col-md-6 centrar form-row">
            <div class="col-md-4">
                <h5 class=""> DEPARTAMENTO:</h5>
            </div>
            <div class="col-md-6 ">

                <label for=""> {{$department->name}} </label>
            </div>
        </div>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-4">
                <h5 class=""> SECCION:</h5>
            </div>
            <div class="col-md-6 ">
                <select name="section_id" id="section_id" class="form-control">
                    <option selected value="">seleccione</option>
                    @foreach($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
                @include('admin.category.fragment.error_section_id')
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-5">
                <label class=" " for="name">
                    <h5>CATEGORY:</h5>
                </label>
            </div>
            <div class="col-md-7 ">
                <input type="text" maxlength="40" pattern="" class="form-control" id="name" name="name"
                    value="{{old('name')}}">
                @include('admin.category.fragment.error_name')
            </div>
        </div>
        <input type="hidden" class=" " id="is_active" name="is_active" value="1">
        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="registrar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">
            <button class="centrar2"><a class="" href="/admin/main"> menu principal </a></button>
        </div>
    </form>
</div>
@endsection
