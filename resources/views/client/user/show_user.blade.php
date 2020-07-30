@extends('neutron.layout')
@section('content')

@include('client.user.fragment.info')

<div class="">
    <h2 class="text-center">DATOS DEL USUARIO</h2>
</div>
<br>
<!-- USUARIO -->
<div class="form-row ">
    <div class="">
        <label for="">Nombre:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->name}}</label>
    </div>
    <div class="ml-5">
        <label for="">Apellido:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->lastname}}</label>
    </div>
</div>
<br>
<div class="form-row">
    <div class="">
        <label for="">Cedula:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->id_type}}-{{$user->id_number}}</label>
    </div>
    <div class="ml-5">
        <label for="">Email:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->email}}</label>
    </div>
</div>
<br>
<div class="form-row">
    <div class="">
        <label for="">Telefono movil:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->mobil_phone_code}}-{{$user->mobil_phone}}</label>
    </div>
    <div class="ml-5">
        <label for="">Telefono fijo:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->area_code}}-{{$user->phone_number}}</label>
    </div>
</div>
<br>
<div class="form-row">
    <div class="">
        <label for="">Direccion:</label>
    </div>
    <div class="">
        <label for="">{{$user->address}}</label>
    </div>
</div>
<br>
<div class="form-row">
    <div class="">
        <label for="">Ciudad:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->city}}</label>
    </div>
    <div class="ml-5">
        <label for="">Estado:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->state}}</label>
    </div>
    <div class="ml-5">
        <label for="">Codigo postal:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$user->zip_code}}</label>
    </div>
</div>
<br>
<br><br>
<div class="">
    <a class="btn btn-primary" href="/neutron"> seguir comprando   </a>

</div>



@endsection
