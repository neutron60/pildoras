<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="web de neutron">
    <meta name="keywords" content="neutron vender comprar">
    <title> neutron </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="">

    <script src="https://kit.fontawesome.com/40d555d624.js" crossorigin="anonymous"></script>


    <style>
        .icono {
            color: blue;
        }

        .icono1 {
            color: aquamarine;
        }

        .icono2 {
            color: deeppink;
        }
        .icono3 {
            color: red;
        }
        img {
            max-width: 100%;
            max-height:
        }
        .centrar {
            margin-left: auto;
            margin-right: auto;
        }
        .centrar1 {
            margin-left: 40%;
            margin-right: auto;
        }
        .centrar2 {
            margin-left: 5%;
            margin-right:
        }
        .imagen {
        padding-right: ;
        padding-left: ;
        padding-top: ;
        padding-bottom: ;
        height: 140px;
        margin-left: ;
        width: 50%
    }

    </style>
</head>

<body>
    @include('admin.plantillaencabezado')



    <div class='container-fluid'>





@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="">
        <h2 class="text-center">DATOS DEL DEPARTAMENTO</h2>
    </div>
    <br>
    <!-- DEPARTAMENTO -->
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-5">
            <label class=" " for="name">
                <h5>DEPARTAMENTO:</h5>
            </label>
        </div>
        <div class="col-md-7 ">
            <label for="">{{$departments->name}}</label>
        </div>
    </div>
    <br><br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">TITULO:</label>
        </div>
        <div class="col-md-8 ">
            <label for="">{{$departments->title}}</label>
        </div>
    </div>
    <br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">DESCRIPCION:</label>
        </div>
        <div class="col-md-8 ">
            <textarea name="" id="" cols="30" rows="10">{{$departments->description}}</textarea>
        </div>
    </div>
    <br>
    <div class="col-md-5 form-row  centrar">
        <div class="col-md-4">
            <label for="status">ESTADO:</label>
        </div>
        <div class="col-md-4">
            <label for="">{{$departments->status}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-6 form-row  centrar">
        <div class="col-md-2">
            <label for="status">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$departments->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="status">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$departments->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class=" col-md-5 centrar form-row">
        <div class="col-md-4">
            <label class="" for="nombre">IMAGEN:</label>
        </div>
        <div class="col-md-8 ">
            <img class="imagen" src="{{$departments->image}}" alt="imagen" />
        </div>
    </div>
    <br><br>
    <div class="">
        <a href="{{route('department.edit', $departments->id)}}" class="btn btn-primary centrar1" name="editar"
            id="">editar </a>
        <a class="btn btn-primary centrar2" href="{{route('department.index')}}">ver departamentos </a>
    </div>
    </form>
</div>
@endsection



</div>
<br>

@include('admin.plantillapie')



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
