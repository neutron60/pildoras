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
        <h2 class="text-center">EDITAR UN USUARIO</h2>
    </div>
    <br>
    <form action="/admin/user/{{$user->id}}" method="POST" enctype="multipart/form-data" novalidate="">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- USUARIO -->

        <div class="form-row ">
            <div class="form-group col-md-2 ml-auto">
                <label for="name">Nombre</label>
                <input type="text" maxlength="50" pattern="[A-Za-z]" class="form-control" id="name" name="name"
                    value="{{$user->name}}">
                @include('admin.user.fragment.error_name')
            </div>
            <div class="form-group  col-md-2 ml-5 mr-auto">
                <label for="lastname">Apellido</label>
                <input type="text" maxlength="50" pattern="[A-Za-z]" class="form-control" id="lastname" name="lastname"
                    value="{{$user->lastname}}">
                @include('admin.user.fragment.error_lastname')
            </div>
            <div class="form-group  col-md-3 centrar">
                <label for="role_id">Rol</label>
                <select id="role_id" class="form-control" name="role_id">
                    <option selected value="{{$user->role_id}}">{{$user->role->role_name}}</option>
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2 centrar">
                <label for="id_type">Cedula</label>
                <select id="id_type" name="id_type" class="form-control">
                    <option selected value="{{$user->id_type}}">{{$user->id_type}}</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                </select>
            </div>
            @include('admin.user.fragment.error_id_type')
            <div class="form-group col-md-2 centrar">
                <label for="id_number"> . </label>
                <input type="number" min="9999" max="999999999" class="form-control" id="id_number" name="id_number"
                    value="{{$user->id_number}}" placeholder="numero">
                @include('admin.user.fragment.error_id_number')
            </div>
        </div>

</div>
<div class="form-row">
    <div class="form-group col-md-1 ml-auto">
        <label for="">Telefono</label>
        <select id="mobil_phone_code" class="form-control" name="mobile_phone_code" value="{{$user->mobil_phone_code}}">
            <option> codigo</option>
            <option value="0412">0412</option>
            <option value="0416">0416</option>
            <option value="0426">0426</option>
            <option value="0414">0414</option>
            <option value="0424">0424</option>
        </select>
    </div>
    <div class="form-group col-md-1 mr-0 ">
        <label for="mobile_phone">Movil </label>
        <input type="tel" maxlength="7" class="form-control" id="mobile_phone" name="mobile_phone"
            value="{{$user->mobil_phone}}" placeholder="numero">
    </div>

    <div class="form-group col-md-1 ml-5">
        <label for="area_code">Telefono</label>
        <input type="text" maxlength="4" class="form-control" id="area_code" name="area_code"
            value="{{$user->area_code}}" placeholder="codigo area">
    </div>
    <div class="form-group col-md-1 mr-auto ">
        <label for="phone_number">fijo</label>
        <input type="tel" maxlength="7" class="form-control" id="phone_number" name="phone_number"
            value="{{$user->phone_number}}" placeholder="numero">
    </div>
</div>

<div class="form-group col-md-7 mr-auto ml-auto">
    <label for="address1">Direccion</label>
    <input type="text" class="form-control" id="address1" name="address1" maxlength="150" value="{{$user->address1}}"
        placeholder="casa apto piso edif calle manzana vereda">
</div>
<div class="form-group col-md-7 mr-auto ml-auto">
    <label for="address2">Direccion</label>
    <input type="text" class="form-control" id="address2" maxlength="150" name="address2" value="{{$user->address2}}"
        placeholder="urbanizacion sector">
</div>

<div class="form-row">
    <div class="form-group col-md-3 ml-auto">
        <label for="city">Ciudad</label>
        <input type="text" maxlength="30" class="form-control" pattern="[A-Za-z]" id="city" name="city"
            value="{{$user->city}}">
    </div>
    <div class="form-group col-md-2 ml-5">
        <label for="state">Estado</label>
        <select id="state" class="form-control" name="state" value="{{$user->state}}">
            <option> </option>
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
    </div>
    <div class="form-group col-md-1 mr-auto ml-5">
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
