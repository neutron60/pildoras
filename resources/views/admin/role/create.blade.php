
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UN NUEVO ROL</h2>
    </div>
    <br>
    <form action="/admin/role" method="POST" enctype="multipart/form-data" novalidate="">
        @csrf

        <!-- DEPARTAMENTO -->

        <div class="form-row">
            <div class="">
                <label class=" " for="role_name">
                    <h5>ROL:</h5>
                </label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="30" pattern="" class="form-control" id="role_name" name="role_name"
                    value="{{old('role_name')}}">
                @include('admin.role.fragment.error_role_name')
            </div>
        </div>
        <br><br>

        <div class="centrar1">
            <input class="" type="submit" name="enviar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">
            <a class="btn btn-secondary centrar2" href="{{route('role.index')}}">ver roles </a>

        </div>
    </form>
</div>
@endsection
