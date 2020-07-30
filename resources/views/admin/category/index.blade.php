

@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center"> CATEGORIAS</h1>

    @include('admin.category.fragment.info')

    <form action="/admin/category/search" class="form-inline">
        <div class="input-group input-group-sm ">
            <div class="">
                <select name="search_department" id="search_department" class="form-control">
                    <option selected value="%">departamento</option>
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

    <br>
    @if($query <> '%')
    <p>Resultado de la busqueda del departamento {{$query}} </p>
    @endif
    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Departamento</th>
                <th class="text-center" scope="col">Seccion</th>
                <th class="text-center" scope="col">categoria</th>
                <th class="text-center" scope="col">Estado</th>
                <th class="text-center" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
            <tr>

                <td class="text-center" scope="row" width="150px">{{$category->name_department}}</td>

                <td class="text-center" scope="row" width="150px">{{$category->name_section}}</td>

                <td class="text-center" scope="row" width="150px">{{$category->name}}</td>

                <td class="text-center" width="80px">{{$category->is_active?'activo':'inactivo'}}</td>

                </td>
                <td class="text-center" width="100px"><button type="button" class="btn btn-default"><a href="{{route('category.show', $category->id)}}"> ver
                        datos categoria</a></button></td>
                <td class="text-center" width="100px"><button type="button" class="btn btn-default"><a href="{{route('category.edit', $category->id)}}">
                        editar categoria</a></button></td>
            </tr>

            @endforeach
        </tbody>
    </table>
    {{$categories->withQueryString()->links()}}
</div>

@endsection
