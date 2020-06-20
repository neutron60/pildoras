@extends('neutron.layout')
@section('content')

<div>
    @foreach($articles->chunk(4) as $articleRow)
    <div class="row">
        @foreach($articleRow as $article)
        <div class="card col-md-3">
            <div class="ml-3" height="">
                <img src="{{$article->image1}}" class="card-img-top image3" height=""
                    alt="imagen articulo">
            </div>
            <div class="card-body ml-3">
                <a href="/neutron/article-detail/{{$article->id}}">
                <h5 class="card-title text-dark">Precio: {{ $price=number_format($article->price,2,",",".")}}</h5>
                <p class="card-text text-dark">{{$article->name}}</p>
            </a>
            </div>
        </div>
        @endforeach
    </div>
    <br>

    @endforeach

</div>
{{$articles->links()}}

        @endsection




