@extends('admin.layout')
@section('aside_right')


@foreach($aside_advertisings as $aside_advertising)
<div class="card">
    <img src="a.JPG" class="card-img-top img-rounded" alt="...">
    <div class="card-body">
        <a href="">
            <p class="card-text font-weight-bold text-dark ">{{$aside_advertising->advertising_text}}.</p>
        </a>
    </div>
</div>
<br>
@endforeach

@endsection
