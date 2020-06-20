@extends('admin.layout')




@section('content')

<p><a href="/admin/article-list-department/{{$article_department->id}}">{{$article_department->name}}</a> -> <a href="/admin/article-list-section/{{$article_section->id}}">{{$article_section->name}}</a> ->
    <a href="/admin/article-list-category/{{$article_category->id}}">{{$article_category->name}}</a> </p>


<!-------------------------------------------------------------------------------------->





     <!-------------------------------------------------------------------------------------->




     @include('neutron.advertising.article_detail_base')


@endsection
