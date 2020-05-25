

@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center"> SECCIONES</h1>

    <form action="/admin/section/search" class="form-inline">
        <div class="input-group input-group-sm ">
            <div class="">
                <select name="search_department" id="search_department" class="form-control">
                    <option selected value="%">todos</option>
                    @foreach($departments as $department){
                    <option value="{{$department->name}}">{{$department->name}}</option>
                    @endforeach
                </select>
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"> </i>
                </button>
            </div>
        </div>
    </form>

    <div pull-right class="centrar3">
    <a class="btn btn-primary  pull-right"  href="/admin/main">menu principal </a>
     </div>
    @include('admin.section.fragment.info')
    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Departamento</th>
                <th class="text-center" scope="col">Seccion</th>
                <th class="text-center" scope="col">Estado</th>
                <th class="text-center" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
            <tr>

                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$section->name_department}}</td>

                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$section->name}}</td>

                <td class="text-center" width="80px">{{$section->is_active?'activo':'inactivo'}}</td>


                <td class="text-center" width="100px"><button type="button" class="btn btn-default"><a href="{{route('section.show', $section->id)}}"> ver
                        datos seccion</a></button></td>
                <td class="text-center" width="100px"><button type="button" class="btn btn-default"><a href="{{route('section.edit', $section->id)}}">
                        editar seccion</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
