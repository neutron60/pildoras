
 @include('neutron.fragment.info')

<img class="image" src="{{asset($advertising->image_header)}}" alt="imagen" height=380px />


<br><br><br>

<!-------------------------------------------------------------------------->
<h2>{{$advertising->bargain_header}}</h2>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($article_bargains->chunk(4) as $article_bargainsRow)
        @if($flag)
        <div class="carousel-item active">
            @else
            <div class="carousel-item">
                @endif
                @php
                $flag=0;
                @endphp
                <div class="row">
                    @foreach($article_bargainsRow as $article_bargain)
                    <div class="col-md-3">
                        <a href="/neutron/article-detail/{{$article_bargain->id}}" class="">
                            <img src="{{asset($article_bargain->image1)}}" class="d-block image1 centrar" alt="...">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <br><br><br>
    <!-------------------------------------------------------------------------->
    <h2>{{$advertising->new_collection_header}}</h2>


    <div id="carouselExampleFade1" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($article_new_collections->chunk(4) as $article_new_collectionsRow)
            @if($flag1)
            <div class="carousel-item active">
                @else
                <div class="carousel-item">
                    @endif
                    @php
                    $flag1=0;
                    @endphp
                    <div class="row">
                        @foreach($article_new_collectionsRow as $article_new_collection)
                        <div class="col-md-3">
                            <a href="/neutron/article-detail/{{$article_new_collection->id}}">
                                <img src="{{asset($article_new_collection->image1)}}" class="d-block image1 centrar" alt="...">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <a class="carousel-control-prev" href="#carouselExampleFade1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <br><br><br>
        <!------------------------------------------------------------------------------------------->

        <h2>{{$advertising->advertising_header}}</h2>

        <div>
            @foreach($departments->chunk(4) as $departmentRow)
            <div class="row">
                @foreach($departmentRow as $department)

                <div class="card col-md-3">
                    <div class="ml-3">
                        <img src="{{asset($department->image)}}" class="card-img-top image2 centrar"
                            alt="imagen departamento">
                    </div>
                    <div class="card-body ml-3">
                        <h5 class="card-title">{{$department->title}}</h5>
                        <p class="card-text">{{$department->description}}</p>
                        <a href="/neutron/article-list-department/{{$department->id}}" class="">descubre mas ....</a>
                    </div>
                </div>

                @endforeach
            </div>
            <br>
            @endforeach

        </div>



