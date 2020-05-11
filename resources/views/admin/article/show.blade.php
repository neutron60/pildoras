<style>
    .imagen {
        padding-right: ;
        padding-left: ;
        padding-top: ;
        padding-bottom: ;
        height: 200px;
        margin-left: ;
        width: 100%
    }
</style>
    @extends('admin.layout')
    @section('content')


    <div class="container-fluid">
      <!-- ARTICULO -->

            <div class=" col-md-6 centrar form-row">
                <div class="col-md-3">
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
                    <label for="">{{$category->name}}</label>

                </div>
            </div>
            <br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-2">
                    <label for="">ARTICULO:</label>
                </div>
                <div class="col-md-10 ">
                    <label for="">{{$article->name}}</label>
                </div>
            </div>
            <br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-2">
                    <label for="">CODIGO:</label>
                </div>
                <div class="col-md-3 ">
                    <label for="">{{$article->code}}</label>
                </div>

                    <div class="col-md-2">
                        <label for="is_active">ESTADO:</label>
                    </div>
                    <div class="col-md-2">
                        <label for="">{{$is_active}}</label>
                    </div>

            </div>
            <br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-2">
                    <label for="">MARCA:</label>
                </div>
                <div class="col-md-3 ">
                    <label for="">{{$article->brand}}</label>

                </div>
                <div class="col-md-2 ml-5">
                    <label for="">MODELO:</label>
                </div>
                <div class="col-md-3 ml-2">
                    <label for="">{{$article->model}}</label>

                </div>
            </div>
            <br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-1">
                    <label for="">TALLA:</label>
                </div>
                <div class="col-md-3 ">
                    <label for="">{{$article->size}}</label>

                </div>
                <div class="col-md-1 ml-5">
                    <label for="">USO:</label>
                </div>
                <div class="col-md-3">
                    <label for="">{{$article->use}}</label>

                </div>
            </div>
            <br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-2">
                    <label for="">PRECIO:</label>
                </div>
                <div class="col-md-3 ">
                    <label for="">{{$article->price}}  Bs.</label>

                </div>
                <div class="col-md-2 ml-4">
                    <label for="">EXISTENCIA:</label>
                </div>
                <div class="col-md-3">
                    <label for="">{{$article->stock}}</label>

                </div>
            </div>
            <br>
            <div class="col-md-6 form-row  centrar">


                <div class="col-md-2">
                    <label for="">CREADO:</label>
                </div>
                <div class="col-md-3">
                    <label for="">{{$article->created_at->toFormattedDateString()}}</label>
                </div>
                <div class="col-md-2">
                    <label for="">ACTUALIZADO:</label>
                </div>
                <div class="col-md-3">
                    <label for="">{{$article->updated_at->toFormattedDateString()}}</label>
                </div>
            </div>
            <br>

            <div class="col-md-6 form-row  centrar">
                <div class="col-md-2">
                    <label for="is_bargain">OFERTA:</label>
                </div>
                <div class="col-md-2">
                    <label for="">{{$is_bargain}}</label>
                </div>

                <div class="col-md-4">
                    <label for="is_new_collection">NUEVA COLECCION:</label>
                </div>
                <div class="col-md-2">
                    <label for="">{{$is_new_collection}}</label>
                </div>
            </div>
            <br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-3">
                    <label class="" for="nombre">DESCRIPCION:</label>
                </div>
                <div class="col-md-8 ">
                    <label class="" for="nombre">{{$article->description}}</label>
                </div>
            </div>
            <br><br>
            <div class=" col-md-6 centrar form-row">
                <div class="col-md-1 mr-2">
                    <label class="" for="nombre">IMAGEN:</label>
                </div>
                <div class="col-md-3 ml-2">
                    <img class="" src="{{$article->image1}}" height="150rem" alt="imagen" >
                </div>
                <div class="col-md-3 ml-2">
                    <img class="" src="{{$article->image2}}" height="150rem" alt="imagen" >
                </div>
                <div class="col-md-3 ml-2">
                    <img class="" src="{{$article->image3}}" height="150rem" alt="imagen" >
                </div>
            </div>
            <br><br>
            <div class="">
                <a href="{{route('article.edit', $article->id)}}" class="btn btn-primary centrar1" name="editar" id="">editar
                </a>
                <a class="btn btn-primary centrar2" href="{{route('article.index')}}">ver articulos </a>
            </div>

    </div>
    @endsection



