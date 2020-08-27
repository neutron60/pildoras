
@extends('admin.layout')
@section('content')



    <div class="">
        <h2 class="text-center">EDICION DE UN ARTICULO</h2>
    </div>
    <br>
    <form action="/admin/article/{{$article->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate"
        id="validar_forma3">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- ARTICULO -->
        <div class="form-row">
            <div class="form-group ">
                <label class=" " for="name">
                    <h5>DEPARTAMENTO:</h5>
                </label>
            </div>
            <div class="form-group  ml-3">
                <label for="">{{$department->name}}</label>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="">SECCION:</label>
            </div>
            <div class="form-group  ml-3">
                <label for="">{{$section->name}}</label>
            </div>
            <div class="form-group  ml-5">
                <label for="">CATEGORIA:</label>
            </div>
            <div class="form-group  ml-3">
                <label for="">{{$category->name}}</label>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="">ARTICULO:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" id="name" name="name" size="50"
                    value="{{$article->name}}">
                @include('admin.article.fragment.error_name')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="">CODIGO:</label>
            </div>
            <div class="form-group  ml-3">
                <label for="">{{$article->code}}</label>
            </div>

            <div class="form-group  ml-5">
                <label for="is_active">ESTADO</label>
            </div>
            <div class="form-group  ml-3">
                <select name="is_active" id="is_active" class="form-control">
                    <option selected value="{{$article->is_active}}">{{$article->is_active?'activo':'inactivo'}}</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="">MARCA:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="model" name="model" size="11"
                value="{{$article->brand}}">
            </div>
            <div class="form-group  ml-4">
                <label for="">MODELO:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="model" name="model" size="11"
                    value="{{$article->model}}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="">TALLA:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="size" name="size" size="7"
                    value="{{$article->size}}">
            </div>
            <div class="form-group  ml-4">
                <label for="">USO:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="use" name="use" size="15"
                    value="{{$article->use}}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="">PRECIO:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="number" maxlength="20"  class="form-control" id="price" name="price" min="0" max="1000000000"
                    value="{{$article->price}}">
                    @include('admin.article.fragment.error_price')
            </div>
            <div class="form-group  ml-5">
                <label for="">EXISTENCIA:</label>
            </div>
            <div class="form-group  ml-3">
                <input type="number" maxlength="10"  class="form-control" id="stock" name="stock" min="0" max="100"
                    value="{{$article->stock}}">
                    @include('admin.article.fragment.error_stock')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label for="is_bargain">OFERTA</label>
            </div>
            <div class="form-group  ml-3">
                <select name="is_bargain" id="is_bargain" class="form-control">
                    <option selected value="{{$article->is_bargain}}">{{$article->is_bargain?'si':'no'}}</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>

            <div class="form-group  ml-5">
                <label for="is_new_collection">NUEVA COLECCION</label>
            </div>
            <div class="form-group  ml-3">
                <select name="is_new_collection" id="is_new_collection" class="form-control">
                    <option selected value="{{$article->is_new_collection}}">{{$article->is_new_collection?'si':'no'}}</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group ">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="form-group  ml-3">
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
            <div class="form-group  col-md-2 mr-5">
                <input type="file" maxlength="50" pattern="" class=" " id="image1" name="image1">
                <br><br>
                <img class="image5 centrar" src="{{asset($article->image1)}}" alt="imagen">
                @include('admin.article.fragment.error_image1')
            </div>

            <div class="form-group  col-md-2 mr-5 ml-5">
                <input type="file" maxlength="50" pattern="" class=" " id="image2" name="image2">
                <br><br>
                <img class="image5 centrar" src="{{asset($article->image2)}}" alt="imagen">
                @include('admin.article.fragment.error_image2')
            </div>

            <div class="form-group  col-md-2 ml-5">
                <input type="file" maxlength="50" pattern="" class=" " id="image3" name="image3">
                <br><br>
                <img class="image5 centrar" src="{{asset($article->image3)}}" alt="imagen">
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
            <input type="submit" name="eliminar articulo" value="eliminar articulo" id="confirmar_borrar" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>

@endsection

