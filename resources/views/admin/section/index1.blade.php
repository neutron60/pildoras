<style>
.centrar3 {
    margin-left: 80;
    margin-right: ;
}
</style>
@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-5"> SECCIONES</h1>
    <div pull-right class="centrar3">
    <a class="btn btn-primary  pull-right"  href="/admin/main">menu principal </a>
     </div>
    @include('admin.section.fragment.info')
    <table class="table-bordered table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" width="150px" height="40px" scope="col">Departamento</th>
                <th class="text-center" width="150px" height="40px" scope="col">Seccion</th>
                <th class="text-center" width="200px" scope="col">Titulo</th>
                <th class="text-center" width="200px" scope="col">Estado</th>
                <th class="text-center" width="100px" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            {{$consulta=$department->sections}}
            @foreach ($consulta as $section)
            <tr>
                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$department->name}}</td>

                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$section->name}}</td>

                <td class="text-center" width="200px">{{$section->title}}</td>

                <td class="text-center" width="200px">{{$section->status}}</td>

                </td>
                <td class="text-center" width="100px"><a href="{{route('section.show', $departments->id)}}"> ver
                        datos</a></td>
                <td class="text-center" width="100px"><a href="{{route('section.edit', $departments->id)}}">
                        editar</a></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="centrar1">

    </div>
</div>
<br>
<!--  <form action="/layouts/create" method="GET">
        <input type="submit" name="registro" value="crear registro" id="">
    </form> -->
@endsection
