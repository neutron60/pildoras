
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDITAR UN ROL</h2>
    </div>
    <br>
    <form action="/admin/role/{{$role->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- DEPARTAMENTO -->

        <div class="form-row">
            <div class="">
                <label class=" " for="role_name">
                    <h5>ROL:</h5>
                </label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="30" pattern="" class="form-control" id="role_name" name="role_name"
                    value="{{$role->role_name}}">
                @include('admin.role.fragment.error_role_name')
            </div>
        </div>
        <br><br>

        <div class="centrar1">
            <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
            <a class="btn btn-secondary centrar2" href="{{route('role.index')}}">ver roles </a>
        </div>
    </form>
    <div class="centrar1">
        <form action="/admin/role/{{$role->id}}" method="POST" enctype="multipart/form-data"
            novalidate="">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="eliminar registro" value="eliminar rol" id="" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>
</div>
@endsection
