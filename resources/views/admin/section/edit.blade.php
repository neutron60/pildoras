<style>
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

@extends('admin.layout')
@section('content')


<div class="container-fluid">
    <div class="">
        <h2 class="text-center">EDICION DE UNA SECCION</h2>
    </div>

    <br>
    <form action="/admin/section/{{$section->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- SECCION -->
        <div class=" col-md-5 centrar form-row">
            <div class="col-md-5">
                <label class=" " for="name">
                    <h5>SECCION:</h5>
                </label>
            </div>
            <div class="col-md-7 ">
                <input type="text" maxlength="40" pattern="" class="form-control" id="name" name="name"
                    value="{{$section->name}}">
                @include('admin.section.fragment.error_name')
            </div>
        </div>
        <br><br>
        <div class="col-md-5 form-row  centrar">
            <div class="col-md-4">
                <label for="is_active">ESTADO</label>
            </div>
            <div class="col-md-4">
                <select name="is_active" id="is_active" class="form-control">
                    <option selected value="{{$section->is_active}}">{{$is_active}}</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                </select>
            </div>
        </div>
        <br><br>

        <br><br>
        <div class="centrar1">
            <input class=" btn btn-secondary" type="submit" name="actualizar" value="actualizar" id="">
            <a class="btn btn-secondary centrar2" href="{{route('section.index')}}">ver secciones </a>
        </div>
    </form>
    <br>
    <div class="centrar1">
        <form action="/admin/section/{{$section->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="eliminar seccion" value="eliminar seccion" id="" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>
</div>
@endsection
