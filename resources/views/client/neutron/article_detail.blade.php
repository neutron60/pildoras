@extends('client.layout')




@section('content')

<p><a href="/neutron/article-list-department/{{$article_department->id}}">{{$article_department->name}}</a> -> <a href="/neutron/article-list-section/{{$article_section->id}}">{{$article_section->name}}</a> ->
    <a href="/neutron/article-list-category/{{$article_category->id}}">{{$article_category->name}}</a> </p>


<!-------------------------------------------------------------------------------------->





     <!-------------------------------------------------------------------------------------->




     @include('neutron.article_detail_base')


@endsection
