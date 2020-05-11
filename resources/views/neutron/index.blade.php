@extends('admin.layout')
@section('content')

<div class="container-fluid">

    @foreach($departments->chunk(3) as $departmentRow)
    <div class="row">
        @foreach($departmentRow as $department)

            <div class="card col-md-3" >
                <div class="ml-3">
                    <img src="{{$department->image}}" class="card-img-top" height="400rem" alt="imagen departamento">
                </div>
                <div class="card-body ml-3">
                    <h5 class="card-title">{{$department->title}}</h5>
                    <p class="card-text">{{$department->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    @endforeach

</div>

@endsection
