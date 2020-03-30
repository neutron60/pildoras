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

        .borde {
            width: 80%;
  border: 2px solid black;
  padding: 5px;
  margin: ;}

  .editar {  border: 2px solid black; color: black; width: 150px; margin-left: 45%; text-align: center;

  }

    </style>
</head>


<body>

    @include('admin.plantillaencabezado')


    <h1 class="text-center">MOSTRAR USUARIO</h1>
    <br>
    <div class="container-fluid">
<h1>hola</h1>
        <form action="">
            <div class="centrar2">
                <label for="bcedula" class="centrar">numero de cedula: </label>
                <input type="search" id="bcedula" name="bcedula">
                <input type="submit" value="buscar">
            </div>
        </form>

        <br><br>
        <div class="form-row ">
            <div class="form-group col-md-3 centrar">
                <label for="nombre">name</label>
                <br>
                <label class="borde"> {{$usuarios->name}} </label>
            </div>
            <div class="form-group  col-md-3 centrar">
                <label for="email">email</label>
                <br>
                <label class="borde"> {{$usuarios->email}} </label>
            </div>
            <div class="form-group  col-md-3 centrar">
                <label for="codigorol">codigo rol</label>
                <br>
                <label class="borde"> {{$usuarios->role_id}} </label>
            </div>
        </div>
        <br>

    </div>
<a href="http://pildoras.test/admin/cruduser/{{$usuarios->id}}/edit">
<h1 class="editar">editar</h1>
<br>

</a>
    <br>
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
