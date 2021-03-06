

<div class="row">
    <div class="col-md-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner ">
                <div class=" carousel-item active">
                    <img src="{{asset($article->image1)}}" class="d-block img-responsive centrar image6" alt="imagen1">
                </div>
                @empty(!$article->image2)
                <div class="carousel-item">
                    <img src="{{asset($article->image2)}}" class="d-block img-responsive centrar image6" alt="imagen2">
                </div>
                @endempty
                @empty(!$article->image3)
                <div class="carousel-item">
                    <img src="{{asset($article->image3)}}" class="d-block img-responsive centrar image6" alt="imagen3">
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



    <div class="col-md-7">
        <h2 class="text-center text-capitalize ml-4 mr-4">{{$article->name}}</h2>
        <br><br><br>

        <div>
            <h3 class="ml-5">Precio: {{$price}} Bs</h3>
        </div>

        <form action="/client/purchase/create-purchase" method="POST" novalidate="novalidate">

            @csrf

            <br><br>
            <div class="row">

                <div class="ml-5">
                    <label for="id_type">Cantidad:</label>
                </div>
                <div class="ml-3">
                    <select  name="purchased_amount" class="form-control">
                        <option selected value="1">1</option>

                        @while($stock_flag++ < $article_stock) <option value="{{$stock_flag}}">{{$stock_flag}}</option>
                            @endwhile

                    </select>
                </div>
                <div class="ml-3">
                    <label for="id_type">( {{$article_stock}} unidades disponibles )</label>
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
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="ml-5">
                <input class="btn btn-primary btn-lg" type="submit" name="registrar" value="comprar" >

            </div>
            @include('neutron.fragment.info')
        </form>
    </div>
</div>



<br> <br>
<div class="col-md-6 ml-5">
    <h5>DESCRIPCION</h5>
    <br>
    <textarea class="" rows="30" cols="70" style="border: none;" disabled> {{$article->description}}</textarea>
</div>

<!-------------------------------------------------------------------------------------->

