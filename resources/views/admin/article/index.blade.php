<style>
.centrar3 {
    margin-left: 80;
    margin-right: ;
}
</style>

@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5"> ARTICULOS</h1>
    <br>
    <form action="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control form-control-navbar" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"> </i>
                </button>
            </div>
        </div>
    </form>
    <br>
    <div pull-right class="centrar3">
    <a class="btn btn-primary  pull-right"  href="/admin/main">menu principal </a>
     </div>
    @include('admin.article.fragment.info')
    <table class="table-bordered table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" width="" height="40px" scope="col">Departamento</th>
                <th class="text-center" width="" height="40px" scope="col">Seccion</th>
                <th class="text-center" width="" height="40px" scope="col">Categoria</th>
                <th class="text-center" width="" height="40px" scope="col">Articulo</th>
                <th class="text-center" width="" height="40px" scope="col">Codigo</th>
                <th class="text-center" width="" scope="col">Estado</th>
                <th class="text-center" width="" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            @foreach ($department->sections as $section)
            @foreach ($section->categories as $category)
            @foreach ($category->articles as $article)
            <tr>
                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$department->name}}</td>

                <td class="text-center" scope="row" width="120px" padding-top="10%" >{{$section->name}}</td>

                <td class="text-center" scope="row" width="150px" padding-top="10%" >{{$category->name}}</td>

                <td class="text-center" scope="row" width="200px" padding-top="10%" >{{$article->name}}</td>

                <td class="text-center" scope="row" width="100px" padding-top="10%" >{{$article->code}}</td>

                <td class="text-center" width="100px">{{$is_active[$article->id]}}</td>

                </td>
                <td class="text-center" width="100px"><a href="{{route('article.show', $article->id)}}"> ver
                        datos articulo</a></td>
                <td class="text-center" width="80px"><a href="{{route('article.edit', $article->id)}}">
                        editar</a></td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>

@endsection
