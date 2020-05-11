<style>
    .centrar2 {
        margin-left: 40%;
        margin-right:
    }

</style>


@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <div class="">
        <h2 class="text-center">DATOS DEL USUARIO</h2>
    </div>
    <br>

    <!-- USUARIO -->


    <div class="col-md-10 form-row  centrar">
        <div class="col-md-1">
            <label for="">Nombre:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->name}}</label>
        </div>
        <div class="col-md-1">
            <label for="">Apellido:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->lastname}}</label>
        </div>
        <div class="col-md-1">
            <label for="">Rol:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->role->role_name}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-7 form-row  centrar">
        <div class="col-md-1">
            <label for="">Cedula:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->id_type}}-{{$user->id_number}}</label>
        </div>
        <div class="col-md-1">
            <label for="">Email:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->email}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-10 form-row  centrar">
        <div class="col-md-2">
            <label for="">Telefono movil:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->mobil_phone_code}}-{{$user->mobil_phone}}</label>
        </div>
        <div class="col-md-2">
            <label for="">Telefono fijo:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->area_code}}-{{$user->phone_number}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-10 form-row  centrar">
        <div class="col-md-2">
            <label for="">Direccion:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->address1}}</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->address2}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-8 form-row  centrar">
        <div class="col-md-2">
            <label for="">Ciudad:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->city}}</label>
        </div>
        <div class="col-md-2">
            <label for="">Estado:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->state}}</label>
        </div>
        <div class="col-md-2">
            <label for="">Codigo postal:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->zip_code}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-10 form-row  centrar">
        <div class="col-md-1">
            <label for="">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$user->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class="">
        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary centrar1" name="editar" id="">editar
        </a>
        <a class="btn btn-primary centrar2" href="{{route('user.index')}}">ver usuarios </a>
    </div>

</div>

@endsection
