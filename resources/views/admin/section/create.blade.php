
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UNA NUEVA SECCION</h2>
    </div>
    <br>
    <form action="/admin/section" method="POST" enctype="multipart/form-data" novalidate="" id="validar_forma">
        @csrf

        <!-- SECCION -->

        <div class="form-row">
            <div class="">
                <h5 class=""> DEPARTAMENTO:</h5>
            </div>
            <div class="ml-3">
                <select name="department_id" id="department_id" class="form-control required">
                    <option selected value="">seleccione</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @include('admin.section.fragment.error_department_id')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class=" " for="name">
                    <h5>SECCION:</h5>
                </label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="40" pattern="" class="form-control required" id="name" name="name"
                    value="{{old('name')}}">
                @include('admin.section.fragment.error_name')
            </div>
        </div>
        <input type="hidden" class=" " id="is_active" name="is_active" value="1">
        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="registrar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">

        </div>
    </form>
</div>
@endsection
