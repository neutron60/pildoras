@if ($errors->has('shipping_address'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('shipping_address')}}</p>
</div>
@endif





