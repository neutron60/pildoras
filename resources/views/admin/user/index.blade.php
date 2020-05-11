@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5"> USUARIOS</h1>
    <div pull-right class="centrar3">
        <a class="btn btn-primary  pull-right"  href="/admin/main">menu principal </a>
         </div>

    <table class="centrar table-striped table-responsive ">
        <thead>
            <tr>
                <th class="text-center anchoceldas" scope="col">Nombre</th>
                <th class="text-center anchoceldas" scope="col">Apellido</th>
                <th class="text-center anchoceldas" scope="col">Cedula</th>

                <th class="text-center anchoceldas" scope="col">rol</th>
                <th class="text-center anchoceldas" scope="col">Email</th>
                <th class="text-center" width="100px" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center anchoceldas" width="200px">{{$user->name}}</td>

                <td class="text-center" scope="row" width="200px" padding-top="10%">{{$user->lastname}}</td>

                <td class="text-center" width="100px">{{$user->id_type}}-{{$user->id_number}}</td>



                <td class="text-center" width="150px">{{$user->role->role_name}}</td>

                <td class="text-center" width="200px">{{$user->email}}</td>

                <td class="text-center" width="100px"><a href="{{route('user.show', $user->id)}}"> ver
                        datos usuario</a></td>
                <td class="text-center" width="100px"><a href="{{route('user.edit', $user->id)}}">
                        editar usuario</a></td>

                @endforeach
        </tbody>
    </table>
</div>
<br>

@endsection
