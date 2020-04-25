@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class=" col-md-10 centrar form-row">
        <div class="col-md-3">
            <label class=" " for="name">
                <h4>DEPARTAMENTO:</h4>
            </label>
        </div>
        <div class="col-md-3 ">
            <label for=""></label>
        </div>
        <br>
    </div>
    <!-- SECCION -->
    @include('admin.section.fragment.info')
    <div class=" col-md-10 centrar form-row">
        <div class="col-md-1">
            <label class=" " for="name">
                <h5>SECCION:</h5>
            </label>
        </div>
        <div class="col-md-2 ">
            <label for="">{{$section->name}}</label>
        </div>
        <div class="col-md-1">
            <label class="" for="title">TITULO:</label>
        </div>
        <div class="col-md-2 ">
            <label for="">{{$section->title}}</label>
        </div>
        <div class="col-md-1">
            <label class="" for="title">CATEGORIA:</label>
        </div>
        <div class="col-md-2 ">
            <label for="">{{$section->category}}</label>
        </div>
    </div>
    <br>
    <div class="col-md-10 form-row  centrar">
        <div class="col-md-1">
            <label for="status">ESTADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$section->status}}</label>
        </div>

        <div class="col-md-1">
            <label for="status">CREADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$section->created_at->toFormattedDateString()}}</label>
        </div>
        <div class="col-md-2">
            <label for="status">ACTUALIZADO:</label>
        </div>
        <div class="col-md-2">
            <label for="">{{$section->updated_at->toFormattedDateString()}}</label>
        </div>
    </div>
    <br><br>
    <div class=" col-md-10 centrar form-row">
        <div class="col-md-2">
            <label class="" for="nombre">DESCRIPCION:</label>
        </div>
        <div class="col-md-4 ">
            <textarea name="" id="" cols="30" rows="10">{{$section->description}}</textarea>
        </div>
        <div class="col-md-1">
            <label class="" for="nombre">IMAGEN:</label>
        </div>
        <div class="col-md-3 ">
            <img class="imagen" src="{{$section->image}}" alt="imagen" />
        </div>
    </div>
    <br>

    <br>
    <div class="">
        <a href="{{route('section.edit', $section->id)}}" class="btn btn-primary centrar1" name="editar" id="">editar
        </a>
        <a class="btn btn-primary centrar2" href="{{route('section.index')}}">ver secciones </a>
    </div>
    </form>
</div>
@endsection
