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


    </style>

    <style>
        .centrar {
            margin-left: auto;
            margin-right: auto;
        }

        .centrar1 {
            margin-left: 30%;
            margin-right: ;
        }

        .centrar2 {
            margin-left: 35%;
        }

    </style>
</head>


<body>

    @include('admin.plantillaencabezado')


    <h1 class="text-center">EDICION DE USUARIO</h1>
    <br>
    <div class="container-fluid">

        @if($errors->any())
        <div class="alert alert-danger">
            <p> por favor corrige los siguientes errores</p>
            <!--<ul>
               @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul> -->
        </div>
        @endif

        <form action="/admin/cruduser/{{$usuarios->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <!--el metodo es exigido por update-->


            <br><br>
            <div class="form-row ">
                <div class="form-group col-md-3 centrar">
                    <label for="nombre">name</label>
                    <input type="text" class="form-control" id="nombre" name="name" value="{{$usuarios->name}}">
                    @if ($errors->has('name'))
                    <p> {{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group  col-md-3 centrar">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$usuarios->email}}">
                    @if ($errors->has('email'))
                    <p> {{$errors->first('email')}}</p>
                    @endif
                </div>

                <div class="form-group col-md-2 centrar">
                    <label for="rol">rol</label>
                    <select name="role_id" id="estado" class="form-control">
                        <option selected value="{{$usuarios->role_id}}">{{$roles->nombre_rol}}</option>
                        <option value="1">administrador</option>
                        <option value="2">cliente</option>
                        <option value="3">vendedor</option>

                    </select>
                </div>
            </div>
            <br>




            <input type="submit" name="actualizar registro" value="actualizar registro" id="">
            <input type="reset" name="borrar planilla" value="borrar planilla" id="">

        </form>
    </div>

    <br>






    <form action="/admin/cruduser/{{$usuarios->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="eliminar registro" value="eliminar registro" id="">

    </form>

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
