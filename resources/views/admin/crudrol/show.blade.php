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

    @include('layouts.plantillaencabezado')

    <div class="container-fluid">
        <h1 class="text-center mb-5"> MOSTRAR ARTICULOS</h1>
        <table class="centrar table-bordered table-responsive ">
            <thead>
                <tr>
                    <th class="text-center anchoceldas" scope="col">Departamento</th>
                    <th class="text-center anchoceldas" scope="col">Seccion</th>
                    <th class="text-center anchoceldas" scope="col">Codigo</th>
                    <th class="text-center anchoceldas" scope="col">Articulo</th>
                    <th class="text-center anchoceldas" scope="col">Marca</th>
                    <th class="text-center anchoceldas" scope="col">Modelo</th>
                    <th class="text-center anchoceldas" scope="col">Descripcion</th>
                    <th class="text-center anchoceldas" scope="col">Status</th>
                    <th class="text-center anchoceldas" scope="col">Ruta imagen</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td class="text-center anchoceldas">{{$articulos->departamento}}</td>
                    <td class="text-center anchoceldas">{{$articulos->seccion}}</td>
                    <td class="text-center anchoceldas">{{$articulos->codigo}}</td>
                    <td class="text-center anchoceldas">{{$articulos->articulo}}</td>
                    <td class="text-center anchoceldas">{{$articulos->marca}}</td>
                    <td class="text-center anchoceldas">{{$articulos->modelo}}</td>
                    <td class="text-center anchoceldas">{{$articulos->descripcion}}</td>
                    <td class="text-center anchoceldas">{{$articulos->status}}</td>
                    <td class="text-center anchoceldas">{{$articulos->ruta_imagen}}</td>

                </tr>

            </tbody>
        </table>
    </div>
    <br>
    @include('layouts.plantillapie')

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
