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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

    <script src="/js/change_id.js"></script>


    <style>
        .icono {
            color: blue;
        }

        .icono1 {
            color: aquamarine;
        }

        .icono2 {
            color: deeppink;
        }

        .icono3 {
            color: red;
        }

        .image2 {
            max-width: 100%;
            width: 100%;
            height: 250px;
            padding-left: %;
            padding-right: %;
            margin-left: %;
            margin-right: %;
            max-height:
        }

        .image1 {
            max-width: 100%;
            width: ;
            height: 250px;
            padding-left: %;
            padding-right: %;
            margin-left: %;
            margin-right: %;
            max-height:
        }

        .image {
            max-width: 100%;
            width: auto;
            height: ;
            padding-left: %;
            padding-right: %;
            margin-left: %;
            margin-right: %;
            max-height:
        }

        .image3 {
            max-width: 100%;
            max-height: ;
            width: auto;
            height: 250px;
            padding-left: %;
            padding-right: %;
            margin-left: %;
            margin-right: %;
            max-height:
        }



        .centrar {
            margin-left: auto;
            margin-right: auto;
        }

        .centrar1 {
            margin-left: 40%;
            margin-right: auto;
        }

        .centrar2 {
            margin-left: 5%;
            margin-right:
        }


        .contenedor {
            overflow-x: scroll;
        }

        .back {
            background: #EDEFEF;
        }

        .contenedor{
            display: grid;
            grid-template-columns: 1fr 7fr 1fr;
            grid-template-rows: repeat(4, auto);

            grid-gap:20px;
            grid-template-areas: "header header header"
            "nav nav nav"
            "aside1 contenido aside2"
            "footer footer footer";
        }

        .header{
            grid-area: header;
        }

        .nav{
            grid-area: nav;
        }

        .aside1{
            grid-area: aside1;
        }

        .contenido{
            grid-area: contenido;
        }

        .aside2{
            grid-area: aside2;
        }

        .footer{
            grid-area: footer;
        }


    </style>
</head>

<body>

    <div class="contenedor">
        <div class="header">
            @include('neutron.header')

        </div>

        <div class="nav">
            @include('neutron.navigation_bar')

        </div>

        <div class="aside1 back">


                    @include('neutron.left_aside')

        </div>

        <div class="content">

                @yield('content')

        </div>

        <div class="aside2">

                @include('neutron.right_aside')

        </div>


        <br>

        <div class="footer">
            @include('neutron.plantillapie')
        </div>


    </div>




</body>

</html>
