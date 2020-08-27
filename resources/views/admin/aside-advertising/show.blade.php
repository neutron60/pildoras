@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <div class="">
        <h2 class="text-center">PUBLICIDAD LATERAL</h2>
    </div>
    <br>



    <div class="media ">
        <img src="{{asset($aside_advertising->advertising_image)}}" class="img-responsive image5 mr-3 col-4 col-md-3 col-lg-4 col-xl-3" alt="imagen" >
        <div class="media-body mt-5 col-8 col-md-9 col-lg-8 col-xl-9">
            <div>
                <label for="">Texto:</label>
                <label for="">{{$aside_advertising->advertising_text}}</label>
            </div>
            <br>
            <div>
                <label for="" >Direccion URL:</label>
                <label for="" >{{$aside_advertising->advertising_url}}</label>
            </div>
        </div>
        </div>
        <br>
        <div class="">
            <a href="{{route('aside-advertising.edit', $aside_advertising->id)}}" class="btn btn-primary centrar1"
                name="editar" id="">editar </a>
            <a class="btn btn-primary centrar2" href="{{route('aside-advertising.index')}}">ver publicidades </a>
        </div>
    </div>

    @endsection
