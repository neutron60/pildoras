
@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-5"> DEPARTAMENTOS</h1>
    <div pull-right class="">
    <a class="btn btn-primary  pull-right"  href="/admin/main">menu principal </a>
     </div>
    @include('admin.department.fragment.info')
    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Titulo</th>
                <th class="text-center" scope="col">Estado</th>
                <th class="text-center" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($departments as $department)
            <tr>
                <td class="text-center" scope="row" width="200px" padding-top="10%" >{{$department->name}}</td>

                <td class="text-center" width="200px">{{$department->title}}</td>

                <td class="text-center" width="80px">{{$department->is_active?'activo':'inactivo'}}</td>

                <td class="text-center" width="100px"> <button type="button" class="btn btn-default"> <a href="{{route('department.show', $department->id)}}"> ver
                        datos departamento</a></button></td>
                <td class="text-center" width="100px"> <button type="button" class="btn btn-default"><a href="{{route('department.edit', $department->id)}}">
                        editar</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>



</div>

@endsection
