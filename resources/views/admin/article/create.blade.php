@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UN NUEVO ARTICULO</h2>
    </div>
    <br>
    <form action="/admin/article" method="POST" enctype="multipart/form-data" novalidate="" novalidate="novalidate" id="validar_forma3">
        @csrf

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
            <div class="form-group">
                <label for="">SECCION:</label>
            </div>
            <div class="form-group ml-3">
                <label for="">{{$section->name}}</label>
            </div>
            <div class="form-group ml-5">
                <label for="">CATEGORIA:</label>
            </div>
            <div class="form-group ml-3">
                <select name="category_id" id="category_id" class="form-control">
                    <option selected value=" "> </option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @include('admin.article.fragment.error_category_id')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label for="">ARTICULO:</label>
            </div>
            <div class="form-group ml-3">
                <input type="text" maxlength="100" pattern="" class="form-control" size="50" id="name" name="name"
                    value="{{old('name')}}">
                @include('admin.article.fragment.error_name')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label for="">CODIGO:</label>
            </div>
            <div class="form-group ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="code" name="code"
                    value="{{old('code')}}">
                @include('admin.article.fragment.error_code')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label for="">MARCA:</label>
            </div>
            <div class="form-group ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="brand" name="brand" size="11"
                    value="{{old('brand')}}">
            </div>
            <div class="form-group ml-5">
                <label for="">MODELO:</label>
            </div>
            <div class="form-group ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="model" name="model" size="11"
                    value="{{old('model')}}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label for="">TALLA:</label>
            </div>
            <div class="form-group ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="size" name="size" size="7"
                    value="{{old('size')}}">
            </div>
            <div class="form-group ml-5">
                <label for="">USO:</label>
            </div>
            <div class="form-group ml-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="use" name="use" size="15"
                    value="{{old('use')}}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label for="">PRECIO:</label>
            </div>
            <div class="form-group ml-3">
                <input type="number" maxlength="50" pattern="" class="form-control" id="price" name="price" min="0" max="100000000"
                    value="{{old('price')}}">
                    @include('admin.article.fragment.error_price')
            </div>
            <div class="form-group ml-5">
                <label for="">EXISTENCIA:</label>
            </div>
            <div class="form-group ml-3">
                <input type="number" maxlength="50"  pattern="" class="form-control" id="stock" name="stock" min="0" max="100"
                    value="{{old('stock')}}">
                    @include('admin.article.fragment.error_stock')
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label for="is_bargain">OFERTA:</label>
            </div>
            <div class="form-group ml-3">
                <select name="is_bargain" id="is_bargain" class="form-control">
                    <option selected value="0">no</option>
                    <option value="1">si</option>
                </select>
            </div>
            <div class="form-group ml-5">
                <label for="is_new_collection">NUEVA COLECCION:</label>
            </div>
            <div class="form-group ml-3">
                <select name="is_new_collection" id="is_new_collection" class="form-control">
                    <option selected value="0">no</option>
                    <option value="1">si</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="form-group ml-3 ">
                <textarea maxlength="2000" rows="10" cols="40" pattern="" class="form-control" id="description"
                    name="description">{{old('description')}} </textarea>
                @include('admin.article.fragment.error_description')
            </div>
        </div>
        <br><br>
            <div class="">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <br>
            <div class="col-md-6">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image1" name="image1" value="{{old('image1')}}">
                @include('admin.article.fragment.error_image1')
            </div>
            <br>
            <div class="col-md-6">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image2" name="image2" value="{{old('image2')}}">
                @include('admin.article.fragment.error_image2')
            </div>
            <br>
            <div class="col-md-6">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image3" name="image3" value="{{old('image3')}}">
                @include('admin.article.fragment.error_image3')
            </div>
            <input type="hidden" class=" " id="is_active" name="is_active" value="1">

        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="registrar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">

        </div>
    </form>
</div>

@endsection



