
        @extends('admin.layout')
        @section('content')
        <h3 class="text-center">CREACION DE UN NUEVO ARTICULO</h3>
        <br><br>
        <h4 class="text-center">SELECIONE EL DEPARTAMENTO</h4>
        <div class="col-md-2">
        <ul class="list-group">
            @foreach ($departments as $department)
            <a href="/admin/article/select-section/{{$department->id}}"><li class="list-group-item" >{{$department->name}}</li></a>

            @endforeach
          </ul>
        </div>


        @endsection




