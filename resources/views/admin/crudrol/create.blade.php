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
            margin: 0 auto;
        }

        .borde {
            border: 1px solid black;
        }

        .ancho {
            width: 30%;
        }

        .anchoinput {
            width: 300px;
        }

        .spaceceldas {
            border-collapse: separate;
            border-spacing: 0px 5px;
        }

    </style>
</head>


<body>

    @include('layouts.plantillaencabezado')


    <h1 class="text-center mb-5"> INSERTAR ARTICULOS</h1>
    <form action="/layouts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="table-responsive">
            <table class="centrar spaceceldas">
                <tr class=" ">
                    <td class="ancho">Departamento:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="departamento"></td>
                </tr>
                <tr class="espacio">
                    <td class="ancho">Seccion:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="seccion"></td>
                </tr>
                <tr class=" ">
                    <td class="ancho">Codigo:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="codigo"></td>
                </tr>
                <tr class=" ">
                    <td class="ancho">Articulo:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="articulo"></td>
                </tr>
                <tr class=" ">
                    <td class="ancho">Marca:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="marca"></td>
                </tr>
                <tr class=" ">
                    <td class="ancho">Modelo:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="modelo"></td>
                </tr>
                <tr class=" ">
                    <td class="ancho">Descripcion:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="descripcion"></td>
                </tr>
                <tr class=" ">
                    <td class="ancho">Status:</td>
                    <td class=""><input class="borde anchoinput" type="text" name="status"></td>
                </tr>
            </table>
            <label for=""> anexe la imagen</label>
            <input type="file" name="imagen" size="20">  <!--imagen es el nonbre donde viaja el archivo
            <input type="submit" name="imagen" value="seleccione imagen">-->

        </div>
        <input type="submit" name="enviar" value="enviar" id="">
        <input type="reset" name="borrar" value="borrar" id="">

    </form>
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
