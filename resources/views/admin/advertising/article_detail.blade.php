@extends('admin.layout')
@section('content')






<!-------------------------------------------------------------------------------------->

<div class="row">
    <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class=" carousel-item active">
                    <img src="{{$article->image1}}" class="d-block" height="400rem" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{$article->image2}}" class="d-block" height="400rem" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{$article->image3}}" class="d-block" height="400rem" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="col-md-6">
        <h2 class="text-center">{{$article->name}}</h2>
        <br><br><br>
        <div class="row">
            <div>
                <label for="">Precio: {{$article->price}}</label>
            </div>
            <div>
                <label for=""> Bs </label>
            </div>
            <br>
        </div>
        <br><br>
        <div class="row">

            <div class="ml-5">
                <label for="id_type">Cantidad:</label>
            </div>
            <div class="ml-3">
                <select id="" name="" class="form-control">
                    <option selected value="">1</option>
                 )
                    @while($stock_flag++ < $article_stock)

                    <option value="V">{{$stock_flag}}</option>
                    @endwhile

                </select>
            </div>
            <div class="ml-3">
                <label for="id_type">( {{$article->stock}} unidades disponibles )</label>
            </div>
        </div>
        <br>
        <div class="row">
            <div>
                <label class="ml-5" for="">Marca:</label>
                <label class="ml-3" for="">{{$article->brand}}</label>
                <label class="ml-5" for="">Modelo:</label>
                <label class="ml-3" for="" {{$article->model}}></label>
            </div>

        </div>
        <br>
        <div class="ml-5">
            <button class="btn btn-primary btn-lg">comprar</button>
        </div>
    </div>
</div>
<br> <br>
<div class="col-md-6">
    <h6>DESCRIPCION</h6>
    <P> {{$article->description}}</P>
</div>

<!-------------------------------------------------------------------------------------->
<br><br>





@endsection
