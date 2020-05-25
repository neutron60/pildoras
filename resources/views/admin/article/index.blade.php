

@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5"> ARTICULOS</h1>

    <form action="/admin/article/search" class="form-inline">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control form-control-navbar col-md-2" name="search_article"
                placeholder="Search" aria-label="Search" size="80px">
            <div class="ml-2">
                <select name="search_department" id="search_department" class="form-control">
                    <option selected value="%">departamentos</option>
                    @foreach($departments as $department){
                    <option value="{{$department->name}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="ml-2">
                <select name="search_is_bargain" id="search_is_bargain" class="form-control">
                    <option selected value="%">en oferta</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
            <div class="ml-2">
                <select name="search_is_new_collection" id="search_is_new_collection" class="form-control">
                    <option selected value="%">nueva coleccion</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
            <div class="input-group-append ">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"> </i>
                </button>
            </div>
        </div>
    </form>
    <br>
    <div pull-right class="centrar3">
        <a class="btn btn-primary  pull-right" href="/admin/main">menu principal </a>
    </div>
    @include('admin.article.fragment.info')

    <table class="table-striped table-hover table-responsive ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Departamento</th>
                <th class="text-center" scope="col">Seccion</th>
                <th class="text-center" scope="col">Categoria</th>
                <th class="text-center" scope="col">Articulo</th>
                <th class="text-center" scope="col">Codigo</th>
                <th class="text-center" scope="col">Estado</th>
                <th class="text-center" scope="col">Oferta</th>
                <th class="text-center" scope="col">Nueva coleccion</th>
                <th class="text-center" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($articles as $article)
            <tr>
                <td class="text-center" scope="row" width="120px">{{$article->name_department}}</td>

                <td class="text-center" scope="row" width="120px">{{$article->name_section}}</td>

                <td class="text-center" scope="row" width="120px">{{$article->name_category}}</td>

                <td class="text-center" scope="row" width="200px">{{$article->name}}</td>

                <td class="text-center" scope="row" width="80px">{{$article->code}}</td>

                <td class="text-center" width="80px">{{$article->is_active?'activo':'inactivo'}}</td>

                <td class="text-center" width="70px">{{$article->is_bargain?'si':'no'}}</td>

                <td class="text-center" width="70px">{{$article->is_new_collection?'si':'no'}}</td>

                </td>
                <td class="text-center" width="100px"><button type="button" class="btn btn-default"><a href="{{route('article.show', $article->id)}}"> ver
                        datos articulo</a> </button></td>
                <td class="text-center" width="70px"><button type="button" class="btn btn-default"><a href="{{route('article.edit', $article->id)}}">
                        editar</a> </button></td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>
{{$articles->links()}}

@endsection
