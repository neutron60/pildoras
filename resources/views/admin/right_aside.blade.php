


@foreach($aside_advertisings as $aside_advertising)
<div class="card">
    <img src="{{$aside_advertising->advertising_image}}" class="card-img-top img-rounded" alt="...">
    <div class="card-body">
        <a href="{{$aside_advertising->advertising_url}}">
            <p class="card-text font-weight-bold text-dark ">{{$aside_advertising->advertising_text}}.</p>
        </a>
    </div>
</div>
<br>
@endforeach

