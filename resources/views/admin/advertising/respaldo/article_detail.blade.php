@extends('admin.layout')


@section('content')

<!-------------------------------------------------------------------------------------->

<p><a href="/admin/article-list-department/{{$article_department->id}}">{{$article_department->name}}</a> -> <a href="/admin/article-list-section/{{$article_section->id}}">{{$article_section->name}}</a> ->
     <a href="/admin/article-list-category/{{$article_category->id}}">{{$article_category->name}}</a> </p>



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
                    <img src="{{$article->image1}}" class="d-block img-responsive" height="400rem" alt="...">
                </div>
                @empty(!$article->image2)
                <div class="carousel-item">
                    <img src="{{$article->image2}}" class="d-blockimg-responsive " height="400rem" alt="...">
                </div>
                @endempty
                @empty(!$article->image3)
                <div class="carousel-item">
                    <img src="{{$article->image3}}" class="d-blockimg-responsive " height="400rem" alt="...">
                </div>
                @endempty
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
        <h2 class="text-center text-capitalize ml-4 mr-4">{{$article->name}}</h2>
        <br><br><br>

            <div>
                <h3 class="ml-5">Precio: {{$price}} Bs</h3>
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
    <h5>DESCRIPCION</h5>
    <br>
    <textarea class="" rows="50" cols="100" style="border: none;"> {{$article->description}}</textarea>
</div>

<!-------------------------------------------------------------------------------------->
<br><br>





@endsection
