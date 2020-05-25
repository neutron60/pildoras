
@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <div class="">
            <h2 class="text-center">REGISTRAR UN NUEVA PUBLICIDAD LATERAL</h2>
        </div>
        <br>
        <form action="/admin/aside-advertising" method="POST" enctype="multipart/form-data" novalidate="" novalidate="novalidate">
            @csrf

            <div class="form-group">
                <label for="">Introduzca los datos de la publicidad:</label>
            </div>
            <div class="form-group">
                <label for="advertising_text">Texto:</label>
                <input type="advertising_text" class="form-control" name="advertising_text" id="text"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="advertising_url">Direccion URL:</label>
                <input type="text" class="form-control" id="url" name="advertising_url">
            </div>
            <div class="form-group">
                <label for="advertising_image">Imagen:</label>
                <input type="file" class="form-control-file" id="advertising_image" name="advertising_image">
            </div>
            <button type="submit" class="btn btn-primary">registrar</button>
        </form>

    </div>

    @endsection





















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
