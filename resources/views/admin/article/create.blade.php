@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">REGISTRAR UN NUEVO ARTICULO</h2>
    </div>
    <br>
    <form action="/admin/article" method="POST" enctype="multipart/form-data" novalidate="" novalidate="novalidate">
        @csrf

        <!-- ARTICULO -->

        <div class=" col-md-5 centrar form-row">
            <div class="col-md-4">
                <label class=" " for="name">
                    <h5>DEPARTAMENTO:</h5>
                </label>
            </div>
            <div class="col-md-5 ">
                <label for="">{{$department->name}}</label>
            </div>
        </div>
        <br>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-2">
                <label for="">SECCION:</label>
            </div>
            <div class="col-md-4 ">
                <label for="">{{$section->name}}</label>
            </div>
            <div class="col-md-2">
                <label for="">CATEGORIA:</label>
            </div>
            <div class="col-md-4 ">
                <select name="category_id" id="category_id" class="form-control">
                    <option selected value="{{old('category_id')}}">seleccione</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @include('admin.article.fragment.error_category_id')
            </div>
        </div>
        <br>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-2">
                <label for="">ARTICULO:</label>
            </div>
            <div class="col-md-10 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="name" name="name"
                    value="{{old('name')}}">
                @include('admin.article.fragment.error_name')
            </div>
        </div>
        <br>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-2">
                <label for="">CODIGO:</label>
            </div>
            <div class="col-md-8 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="code" name="code"
                    value="{{old('code')}}">
                @include('admin.article.fragment.error_code')
            </div>
        </div>
        <br>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-2">
                <label for="">MARCA:</label>
            </div>
            <div class="col-md-3 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="brand" name="brand"
                    value="{{old('brand')}}">
            </div>
            <div class="col-md-2 ml-5">
                <label for="">MODELO:</label>
            </div>
            <div class="col-md-3 ml-2">
                <input type="text" maxlength="50" pattern="" class="form-control" id="model" name="model"
                    value="{{old('model')}}">
            </div>
        </div>
        <br>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-1">
                <label for="">TALLA:</label>
            </div>
            <div class="col-md-3 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="size" name="size"
                    value="{{old('size')}}">
            </div>
            <div class="col-md-1 ml-5">
                <label for="">USO:</label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" pattern="" class="form-control" id="use" name="use"
                    value="{{old('use')}}">
            </div>
        </div>
        <br>
        <div class=" col-md-6 centrar form-row">
            <div class="col-md-2">
                <label for="">PRECIO:</label>
            </div>
            <div class="col-md-3 ">
                <input type="number" maxlength="50" pattern="" class="form-control" id="price" name="price"
                    value="{{old('price')}}">
            </div>
            <div class="col-md-2 ml-5">
                <label for="">EXISTENCIA:</label>
            </div>
            <div class="col-md-3">
                <input type="number" maxlength="50" pattern="" class="form-control" id="stock" name="stock"
                    value="{{old('stock')}}">
            </div>
        </div>
        <br>
        <div class="col-md-6 form-row  centrar">
            <div class="col-md-2">
                <label for="is_bargain">OFERTA:</label>
            </div>
            <div class="col-md-3">
                <select name="is_bargain" id="is_bargain" class="form-control">
                    <option selected value="{{old('is_bargain')}}">seleccione</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
            <div class="col-md-3 ml-5">
                <label for="is_new_collection">NUEVA COLECCION:</label>
            </div>
            <div class="col-md-3">
                <select name="is_new_collection" id="is_new_collection" class="form-control">
                    <option selected value="{{old('is_new_collection')}}">seleccione</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
        </div>
        <br>
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-3">
                <label class="" for="nombre">DESCRIPCION:</label>
            </div>
            <div class="col-md-8 ">
                <textarea maxlength="200" rows="10" cols="10" pattern="" class="form-control" id="description"
                    name="description">{{old('description')}} </textarea>
                @include('admin.article.fragment.error_description')
            </div>
        </div>
        <br><br>

            <div class="col-md-6 centrar">
                <label class="" for="nombre">IMAGEN:</label>
            </div>
            <br>
            <div class="col-md-6 centrar ">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image1" name="image1" value="{{old('image1')}}">
                @include('admin.article.fragment.error_image1')
            </div>
            <br>
            <div class="col-md-6 centrar">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image2" name="image2" value="{{old('image2')}}">
                @include('admin.article.fragment.error_image2')
            </div>
            <br>
            <div class="col-md-6 centrar">
                <input type="file" maxlength="50" pattern="[A-Za-z]" class=" " id="image3" name="image3" value="{{old('image3')}}">
                @include('admin.article.fragment.error_image3')
            </div>
            <input type="hidden" class=" " id="is_active" name="is_active" value="1">

        <br><br>
        <div class="centrar1">
            <input class="" type="submit" name="registrar" value="registrar" id="">
            <input class="centrar2" type="reset" name="borrar" value="borrar" id="">
            <button class="centrar2"><a class="" href="/admin/main"> menu principal </a></button>
        </div>
    </form>
</div>

@endsection





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>




</body>

</html>
