@if ($errors->has('shipping_city'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('shipping_city')}}</p>
</div>
@endif





