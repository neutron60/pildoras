
@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDICION DE UN ARTICULO</h2>
    </div>
    <br>
    <form action="/admin/article/{{$article->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- ARTICULO -->
        <div class="form-row">
            <div class="">
                <label class=" " for="name">
                    <h5>DEPARTAMENTO:</h5>
                </label>
            </div>
            <div class="ml-3">
                <label for="">{{$department->name}}</label>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="">SECCION:</label>
            </div>
            <div class="ml-3">
                <label for="">{{$section->name}}</label>
            </div>
            <div class="ml-5">
                <label for="">CATEGORIA:</label>
            </div>
            <div class="ml-3">
                <label for="">{{$category->name}}</label>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="">ARTICULO:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="name" name="name"
                    value="{{$article->name}}">
                @include('admin.article.fragment.error_name')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="">CODIGO:</label>
            </div>
            <div class="ml-3">
                <label for="">{{$article->code}}</label>
            </div>

            <div class="ml-5">
                <label for="is_active">ESTADO</label>
            </div>
            <div class="ml-3">
                <select name="is_active" id="is_active" class="form-control">
                    <option selected value="{{$article->is_active}}">{{$article->is_active?'activo':'inactivo'}}</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="">MARCA:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="model" name="model"
                value="{{$article->brand}}">
            </div>
            <div class="ml-5">
                <label for="">MODELO:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="model" name="model"
                    value="{{$article->model}}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="">TALLA:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="size" name="size"
                    value="{{$article->size}}">
            </div>
            <div class="ml-5">
                <label for="">USO:</label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="use" name="use"
                    value="{{$article->use}}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="">PRECIO:</label>
            </div>
            <div class="ml-3">
                <input type="number" maxlength="50" pattern="" class="form-control" id="price" name="price"
                    value="{{$article->price}}">
                    @include('admin.article.fragment.error_price')
            </div>
            <div class="ml-5">
                <label for="">EXISTENCIA:</label>
            </div>
            <div class="ml-3">
                <input type="number" maxlength="50" pattern="" class="form-control" id="stock" name="stock"
                    value="{{$article->stock}}">
                    @include('admin.article.fragment.error_stock')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label for="is_bargain">OFERTA</label>
            </div>
            <div class="ml-3">
                <select name="is_bargain" id="is_bargain" class="form-control">
                    <option selected value="{{$article->is_bargain}}">{{$article->is_bargain?'si':'no'}}</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>

            <div class="ml-5">
                <label for="is_new_collection">NUEVA COLECCION</label>
            </div>
            <div class="ml-3">
                <select name="is_new_collection" id="is_new_collection" class="form-control">
                    <option selected value="{{$article->is_new_collection}}">{{$article->is_new_collection?'si':'no'}}</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="ml-3">
                <textarea maxlength="2000" rows="10" cols="40" pattern="" class="form-control" id="description"
                    name="description">{{$article->description}} </textarea>
                @include('admin.article.fragment.error_description')
            </div>
        </div>
        <br><br>

            <div class="">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <div class="form-row">
            <div class="col-md-2">
                <input type="file" maxlength="50" pattern="" class=" " id="image1" name="image1">
                <br><br>
                <img class="image centrar" src="{{asset($article->image1)}}" alt="imagen" height="100rem">
                @include('admin.article.fragment.error_image1')
            </div>

            <div class="col-md-2 ml-5">
                <input type="file" maxlength="50" pattern="" class=" " id="image2" name="image2">
                <br><br>
                <img class="image centrar" src="{{asset($article->image2)}}" alt="imagen" height="100rem">
                @include('admin.article.fragment.error_image2')
            </div>

            <div class="col-md-2 ml-5">
                <input type="file" maxlength="50" pattern="" class=" " id="image3" name="image3">
                <br><br>
                <img class="image centrar" src="{{asset($article->image3)}}" alt="imagen" height="100rem">
                @include('admin.article.fragment.error_image3')
            </div>
</div>
        <br><br>
        <div class="centrar1">
            <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
            <a class="btn btn-secondary centrar2" href="{{route('article.index')}}">ver articulos </a>
        </div>
    </form>
    <br>
    <div class="centrar1">
        <form action="/admin/article/{{$article->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="eliminar articulo" value="eliminar articulo" id="" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>
</div>
@endsection

