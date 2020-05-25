@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <div class="">
        <h2 class="text-center">PUBLICIDAD LATERAL</h2>
    </div>
    <br>



    <div class="media">
        <img src="{{$aside_advertising->advertising_image}}" class="image mr-3 col-md-2" alt="imagen" height="150 rem">
        <div class="media-body mt-5">
            <div>
                <label for="">Texto:</label>
                <label for="">{{$aside_advertising->advertising_text}}</label>
            </div>
            <br>
            <div>
                <label for="">Direccion URL:</label>
                <label for="">{{$aside_advertising->advertising_url}}</label>
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
