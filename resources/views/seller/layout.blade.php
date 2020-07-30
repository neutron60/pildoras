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


    <style>

        .image {
            /* se esta usando en edit y show de article*/
            max-width: 100%;
            width: auto;
        }

        .image1 {
            /* se esta usando en index*/
            max-width: 100%;
            height: 280px;
        }

        .image2 {
            /* se esta usando en index, article list*/
            max-width: 100%;
            width: 100%;
            height: 250px;
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

        .gray{
            background: #EDEFEF;
        }

    </style>
</head>



<body>
    @include('neutron.header')
    @include('seller.navigation_bar')
    <div class="container-fluid">

        <div class="row ">

            <div class="col-md-2 gray">

                @include('seller.left_aside')

            </div>

            <div class='col-md-8'>

                @yield('content')

            </div>

            <div class="col-md-2">

                @include('neutron.right_aside')

            </div>
        </div>
    </div>
    <br>
</body>


<footer>
    @include('neutron.plantillapie')
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

</html>
