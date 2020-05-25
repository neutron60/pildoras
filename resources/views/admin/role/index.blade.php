
@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-5">ROLES</h1>
    <div pull-right class="">
        <a class="btn btn-primary  pull-right" href="/admin/main">menu principal </a>
    </div>
    @include('admin.department.fragment.info')
    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" width="150px" height="40px" scope="col">Rol</th>
                <th class="text-center" width="100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td class="text-center" scope="row" width="150px" padding-top="10%">{{$role->role_name}}</td>

                <td class="text-center" width="100px"><a href="{{route('role.edit', $role->id)}}">
                        editar rol</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/admin/role/create" type="button" class="btn btn-primary">registrar un nuevo rol</a>
</div>

@endsection
