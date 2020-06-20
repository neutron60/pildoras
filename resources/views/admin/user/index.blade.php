@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center"> USUARIOS</h1>

    <form action="/admin/user/search" class="form-inline">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control form-control-navbar" name="search_user_name"
                placeholder="nombre" aria-label="Search">
                <input type="search" class="form-control form-control-navbar ml-2" name="search_user_lastname"
                placeholder="apellido" aria-label="Search">
            <div class="">
                <select name="search_role" id="search_role" class="form-control ml-2">
                    <option selected value="%">todos los roles</option>
                    @foreach($roles as $role){
                    <option value="{{$role->role_name}}">{{$role->role_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group-append col-md-1">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"> </i>
                </button>
            </div>
        </div>
    </form>

<br>
@if($query1 <> '%')
    <p>Resultado de la busqueda de los usuarios con el rol {{$query1}} </p>
    @endif
    @if($query2 <> '%')
    <p>Resultado de la usuarios con el nombre {{$query2}} </p>
    @endif
    @if($query3 <> '%')
    <p>Resultado de la usuarios con el apellido {{$query3}} </p>
    @endif

    <table class="table-striped table-responsive table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Apellido</th>
                <th class="text-center" scope="col">Cedula</th>
                <th class="text-center" scope="col">rol</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center" width="150px">{{$user->name}}</td>

                <td class="text-center" scope="row" width="150px" padding-top="10%">{{$user->lastname}}</td>

                <td class="text-center" width="100px">{{$user->id_type}}-{{$user->id_number}}</td>

                <td class="text-center" width="120px">{{$user->role_name}}</td>

                <td class="text-center" width="150px">{{$user->email}}</td>

                <td class="text-center" width="100px"><a href="{{route('user.show', $user->id)}}"> ver
                        datos usuario</a></td>
                <td class="text-center" width="100px"><a href="{{route('user.edit', $user->id)}}">
                        editar usuario</a></td>

                @endforeach
        </tbody>
    </table>
    {{$users->withQueryString()->links()}}
</div>
<br>

@endsection
