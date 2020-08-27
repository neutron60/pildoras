@extends('client.layout')
@section('content')


<div class="">
    <h2 class="text-center">EDITAR UN USUARIO</h2>
</div>
<br>

<!-- USUARIO -->

<div class="form-row">
    <div class="form-group">
        <label for="name">Nombre</label>
        <label for="">{{ $user->name }}</label>
    </div>
    <div class="form-group ml-3">
        <label for="lastname">Apellido</label>
        <label for="">{{ $user->lastname }}</label>
    </div>
</div>
<form action="/client/user/update-user-id-number/{{$user->id}}" method="POST" enctype="multipart/form-data"
    novalidate="novalidate" id="validar_forma">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <!--el metodo es exigido por update-->

    <div class="form-row">
        <div class="form-group ">
            <label for="id_type">Cedula</label>
            <select id="id_type" name="id_type" class="form-control required">
                <option selected value="{{ $user->id_type }}">{{ $user->id_type }}</option>
                <option value="V">V</option>
                <option value="E">E</option>
            </select>
            @include('client.user.fragment.error_id_type')
        </div>
        <div class="form-group">
            <label for="id_number"> . </label>
            <input type="number" min="9999" max="999999999" class="form-control ml-2 required" id="id_number" name="id_number"
                value="{{ $user->id_number }}" placeholder="numero">
            @include('client.user.fragment.error_id_number')
        </div>
    </div>



    <br><br>
    <div class="centrar1">
        <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
        <a class="btn btn-primary ml-5" href="/neutron/index"> seguir comprando   </a>
    </div>
</form>


@endsection
