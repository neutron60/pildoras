


        @extends('admin.layout')
        @section('content')
        <h3 class="text-center">CREACION DE UN NUEVO ARTICULO</h3>
        <br><br>
        <h4 class="text-center">SELECIONE LA SECCION</h4>
        <ul class="list-group centrar">

            @foreach ($sections as $section)

            <a href="/admin/article/create1/{{$section->id}}"><li class="list-group-item" >{{$section->name}}</li></a>

            @endforeach
          </ul>

@endsection


