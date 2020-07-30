
@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDITAR UN USUARIO</h2>
    </div>
    <br>
    <form action="/admin/user/{{$user->id}}" method="POST" enctype="multipart/form-data" novalidate="">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- USUARIO -->

        <div class="form-row">
            <div class="form-group">
                <label for="name">Nombre</label>
                <label for="">{{$user->name}}</label>
            </div>
            <div class="form-group ml-3">
                <label for="lastname">Apellido</label>
                <label for="">{{$user->lastname}}</label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group ">
                <label for="id_type">Cedula</label>
                <select id="id_type" name="id_type" class="form-control">
                    <option selected value="{{$user->id_type}}">{{$user->id_type}}</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                </select>
                @include('client.user.fragment.error_id_type')
            </div>
            <div class="form-group">
                <label for="id_number"> . </label>
                <input type="number" min="9999" max="999999999" class="form-control ml-2" id="id_number"
                    name="id_number" value="{{$user->id_number}}" placeholder="numero">
                @include('client.user.fragment.error_id_number')
            </div>
        </div>
</div>
<div class="form-row">
    <div class="form-group ">
        <label for="">Telefono</label>
        <select id="mobil_phone_code" class="form-control" name="mobile_phone_code" value="{{$user->mobil_phone_code}}">
            <option> codigo</option>
            <option value="0412">0412</option>
            <option value="0416">0416</option>
            <option value="0426">0426</option>
            <option value="0414">0414</option>
            <option value="0424">0424</option>
        </select>
        @include('client.user.fragment.error_mobil_phone_code')
    </div>
    <div class="form-group ">
        <label for="mobile_phone">Movil </label>
        <input type="tel" maxlength="7" class="form-control ml-2" id="mobile_phone" name="mobile_phone"
            value="{{$user->mobil_phone}}" placeholder="numero">
            @include('client.user.fragment.error_mobil_phone')
    </div>

    <div class="form-group ml-5">
        <label for="area_code">Telefono</label>
        <input type="text" maxlength="4" class="form-control" id="area_code" name="area_code"
            value="{{$user->area_code}}" placeholder="codigo area">
            @include('client.user.fragment.error_area_code')
    </div>
    <div class="form-group">
        <label for="phone_number">fijo</label>
        <input type="tel" maxlength="7" class="form-control ml-2" id="phone_number" name="phone_number"
            value="{{$user->phone_number}}" placeholder="numero">
            @include('client.user.fragment.error_phone_number')
    </div>
</div>

<div class="form-group">
    <label for="address1">Direccion</label>
    <input type="text" class="form-control" id="address1" name="address" maxlength="150" value="{{$user->address1}}"
        placeholder="casa apto piso edif calle manzana vereda" size="10">
        @include('client.user.fragment.error_address')
</div>


<div class="form-row">
    <div class="form-group">
        <label for="city">Ciudad</label>
        <input type="text" maxlength="30" class="form-control" pattern="[A-Za-z]" id="city" name="city"
            value="{{$user->city}}">
            @include('client.user.fragment.error_city')
    </div>
    <div class="form-group ml-3">
        <label for="state">Estado</label>
        <select id="state" class="form-control" name="state">
            <option selected value="{{$purchase->shipping_state}}">{{$purchase->shipping_state}}</option>
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
    <div class="form-group ml-3">
        <label for="zip_code">Codigo postal</label>
        <input type="text" class="form-control" maxlength="4" id="zip_code" name="zip_code" value="{{$user->zip_code}}">

    </div>
</div>
<br><br>
<div class="centrar1">
    <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
    <a class="btn btn-secondary centrar2" href="{{route('user.index')}}">ver usuarios </a>
</div>
</form>
</div>

@endsection
