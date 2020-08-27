@extends('client.layout')
@section('content')


<div class="">
    <h2 class="text-center">EDICION DEL NUMERO TELEFONICO</h2>
</div>
<br>


<!-- USUARIO -->

<div class="form-row">
    <div class="">
        <label class="ml-3" for="nombre">Nombre:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->name}} {{$user->lastname}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">cedula:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->id_type}} - {{$user->id_number}}</label>
    </div>
</div>
<br><br>

<form action="/client/user/update-user-phone/{{$user->id}}" method="POST" enctype="multipart/form-data"
    novalidate="" id="validar_forma">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <!--el metodo es exigido por update-->
    <div class="form-row">
        <div class="form-group ">
            <label for="">Telefono</label>
            <select id="mobil_phone_code" class="form-control required" name="mobil_phone_code">
                <option value="{{$user->mobil_phone_code}}"> {{$user->mobil_phone_code}}</option>
                <option value="0412">0412</option>
                <option value="0416">0416</option>
                <option value="0426">0426</option>
                <option value="0414">0414</option>
                <option value="0424">0424</option>
            </select>
            @include('client.user.fragment.error_mobil_phone_code')
        </div>
        <div class="form-group ">
            <label for="mobil_phone">Movil </label>
            <input type="text" maxlength="7" class="form-control required ml-2" id="mobil_phone" name="mobil_phone"
                value="{{$user->mobil_phone}}" placeholder="numero" size="10">
            @include('client.user.fragment.error_mobil_phone')
        </div>
    </div>
    <br>
    <div class="form-row">

        <div class="form-group ">
            <label for="area_code">Telefono</label>
            <input type="text" maxlength="4" class="form-control required" id="area_code" name="area_code"
                value="{{$user->area_code}}" placeholder="codigo area" size="3">
            @include('client.user.fragment.error_area_code')
        </div>
        <div class="form-group">
            <label for="phone_number">fijo</label>
            <input type="text" maxlength="7" class="form-control required ml-2" id="phone_number" name="phone_number"
                value="{{$user->phone_number}}" placeholder="numero" size="10">
            @include('client.user.fragment.error_phone_number')
        </div>
    </div>
    <br><br>
    <div class="centrar1">
        <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
        <a class="btn btn-primary ml-5" href="/neutron/index"> seguir comprando   </a>
    </div>
</form>


@endsection
