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
        .anchoceldas {
            width: 170px;
        }
        .centrar {
            margin: 0 auto;
        }
    </style>
</head>


<body>

    @include('admin.plantillaencabezado')

    <div class="container-fluid">
        <h1 class="text-center mb-5"> USUARIOS</h1>


        <table class="centrar table-bordered table-responsive ">
            <thead>
                <tr>
                    <th class="text-center anchoceldas" scope="col">Name</th>
                    <th class="text-center anchoceldas" scope="col">rol</th>
                    <th class="text-center anchoceldas" scope="col">Email</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td class="text-center anchoceldas"><a href="http://pildoras.test/admin/cruduser/{{$usuario->id}}/edit">{{$usuario->name}}</a></td>
                    @if($usuario->role_id==1)
                  <td class="text-center anchoceldas">administrador</td>

                @elseif($usuario->role_id==2)
                    <td class="text-center anchoceldas">cliente</td>

                @elseif($usuario->role_id==3)
                    <td class="text-center anchoceldas">vendedor</td>

                @else
                    <td class="text-center anchoceldas">error</td>
                @endif
                    <td class="text-center anchoceldas">{{$usuario->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
  <!--  <form action="/layouts/create" method="GET">
        <input type="submit" name="registro" value="crear registro" id="">

    </form> -->

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
