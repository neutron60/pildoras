@extends('client.layout')
@section('content')


<div class="">
    <h2 class="text-center">EDICION DE LA DIRECCION</h2>
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

<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">telf. fijo:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->area_code}} {{$user->phone_number}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">telf. celular:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->mobil_phone_code}} {{$user->mobil_phone}}</label>
    </div>
</div>

<br><br>
<form action="/client/user/update-user-address/{{$user->id}}" method="POST" enctype="multipart/form-data"
    novalidate="novalidate" id="validar_forma">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <!--el metodo es exigido por update-->

    <div class="form-group">
        <label for="address1">Direccion</label>
        <input type="text" class="form-control required" id="address1" name="address" maxlength="150"
            value="{{$user->address}}" placeholder="casa apto piso edif calle manzana vereda" size="10">
        @include('client.user.fragment.error_address')
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="city">Ciudad</label>
            <input type="text" maxlength="30" class="form-control required" pattern="[A-Za-z]" id="city" name="city"
                value="{{$user->city}}">
            @include('client.user.fragment.error_city')
        </div>
    </div>
    <div class="form-row">

        <div class="form-group">
            <label for="state">Estado</label>
            <select id="state" class="form-control required" name="state">
                <option selected value="{{$user->state}}">{{$user->state}}</option>
                <option value="amazonas">amazonas</option>
                <option value="anzoategui">anzoategui</option>
                <option value="apure">apure</option>
                <option value="aragua">aragua</option>
                <option value="barinas">barinas</option>
                <option value="bolivar">bolivar</option>
                <option value="carabobo">carabobo</option>
                <option value="cojedes">cojedes</option>
                <option value="delta amacuro">delta amacuro</option>
                <option value="distrito capital">distrito capital</option>
                <option value="falcon">falcon</option>
                <option value="guarico">guarico</option>
                <option value="lara">lara</option>
                <option value="merida">merida</option>
                <option value="monagas">monagas</option>
                <option value="nueva esparta">nueva esparta</option>
                <option value="portuguesa">portuguesa</option>
                <option value="sucre">sucre</option>
                <option value="tachira">tachira</option>
                <option value="trujillo">trujillo</option>
                <option value="la guaira">la guaira</option>
                <option value="yaracuy">yaracuy</option>
                <option value="zulia">zulia</option>
            </select>
            @include('client.user.fragment.error_state')
        </div>
    </div>
    <div class="form-row">

        <div class="form-group">
            <label for="zip_code">Codigo postal</label>
            <input type="text" class="form-control required" maxlength="4" id="zip_code" name="zip_code"
                value="{{$user->zip_code}}">
        </div>
    </div>
    <br><br>
    <div class="centrar1">
        <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
        <a class="btn btn-primary ml-5" href="/neutron/index"> seguir comprando </a>
    </div>
</form>


@endsection
