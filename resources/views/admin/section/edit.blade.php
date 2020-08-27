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
    <form action="/admin/section/{{$section->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate"
        id="validar_forma">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <!--el metodo es exigido por update-->

        <!-- SECCION -->
        <div class="form-row">
            <div class="">
                <label class=" " for="name">
                    <h5>SECCION:</h5>
                </label>
            </div>
            <div class="ml-3">
                <input type="text" maxlength="40" pattern="" class="form-control required" id="name" name="name"
                    value="{{$section->name}}">
                @include('admin.section.fragment.error_name')
            </div>
        </div>
        <br><br>
        <div class="form-row">
            <div class="">
                <label for="is_active">ESTADO</label>
            </div>
            <div class="ml-3">
                <select name="is_active" id="is_active" class="form-control required">
                    <option selected value="{{$section->is_active}}">{{$section->is_active?'activo':'inactivo'}}</option>
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
            <input type="submit" name="eliminar seccion" value="eliminar seccion" id="confirmar_borrar" class="btn btn-secondary">
            <!--el metodo es exigido por destroy-->
        </form>
    </div>
</div>
@endsection
