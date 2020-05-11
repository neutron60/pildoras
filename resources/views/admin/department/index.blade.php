<style>
.centrar3 {
    margin-left: 80;
    margin-right: ;
}
</style>
@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-5"> DEPARTAMENTOS</h1>
    <div pull-right class="centrar3">
    <a class="btn btn-primary  pull-right"  href="/admin/main">menu principal </a>
     </div>
    @include('admin.department.fragment.info')
    <table class="table-bordered table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" width="150px" height="40px" scope="col">Nombre</th>
                <th class="text-center" width="200px" scope="col">Titulo</th>
                <th class="text-center" width="200px" scope="col">Estado</th>
                <th class="text-center" width="100px" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($departments as $department)
            <tr>
                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$department->name}}</td>

                <td class="text-center" width="200px">{{$department->title}}</td>

                <td class="text-center" width="200px">{{$is_active[$department->id]}}</td>

                <td class="text-center" width="100px"><a href="{{route('department.show', $department->id)}}"> ver
                        datos departamento</a></td>
                <td class="text-center" width="100px"><a href="{{route('department.edit', $department->id)}}">
                        editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
