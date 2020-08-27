
        @extends('admin.layout')
        @section('content')
        <h3 class="text-center">CREACION DE UNA NUEVA CATEGORIA</h3>
        <br><br>
        <h4 class="text-center">SELECIONE EL DEPARTAMENTO</h4>
        <div class="col-md-4 col-lg-3">
        <ul class="list-group">
            @foreach ($departments as $department)
            <a href="/admin/category/create1/{{$department->id}}"><li class="list-group-item">{{$department->name}}</li></a>

            @endforeach
          </ul>
        </div>


        @endsection




