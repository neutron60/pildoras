@extends('admin.layout')
@section('content')

<div class="container-fluid">


    @foreach($departments as $department)

    @if($row === $newrow )
    <div class="row">
        @endif
        <div class="card" style="width: 20rem;">
            <div class="ml-5">
                <img src="{{$department->image}}" class="card-img-top" height="400px" alt="imagen departamento">
            </div>
            <div class="card-body ml-5">
                <h5 class="card-title">{{$department->title}}</h5>
                <p class="card-text">{{$department->description}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @php
        if($row === $newrow ){
        $newrow=$newrow+$maxbyrow;}
        $row++;
        @endphp
        @if($row === $newrow )
    </div>
    @endif
    @endforeach
    <br><br>

    <h2> ggggggggggggggg </h2>

    @foreach($departments->chunk(3) as $departmentRow)
    <div class="row">
        @foreach($departmentRow as $department)

        <div class="card" style="width: 20rem;">
            <div class="ml-5">
                <img src="{{$department->image}}" class="card-img-top" height="400px" alt="imagen departamento">
            </div>
            <div class="card-body ml-5">
                <h5 class="card-title">{{$department->title}}</h5>
                <p class="card-text">{{$department->description}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        @endforeach
    </div>
    @endforeach


    <div class="row">
        @foreach($departments as $department)
        <div class="col-md-3">
            <div class="card" style="width: 25rem;">
                <div class="ml-5">
                    <img src="{{$department->image}}" class="card-img-top" height="450px" alt="imagen departamento">
                </div>
                <div class="card-body ml-5">
                    <h5 class="card-title">{{$department->title}}</h5>
                    <p class="card-text">{{$department->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>

@endsection
