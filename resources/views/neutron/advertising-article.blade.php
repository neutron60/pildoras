@extends('admin.layout')
@section('content')

<div class="container-fluid">

    @foreach($articles->chunk(4) as $articleRow)
    <div class="row">
        @foreach($articleRow as $article)

            <div class="card col-md-3" >
                <div class="ml-3">
                    <img src="{{$article->image}}" class="card-img-top" height="400rem" alt="imagen departamento">
                </div>
                <div class="card-body ml-3">
                    <h5 class="card-title">{{$article->name}}</h5>
                    <p class="card-text">{{$article->price}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    @endforeach

</div>

@endsection
