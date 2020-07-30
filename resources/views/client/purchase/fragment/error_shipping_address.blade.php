@if ($errors->has('shipping_address'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('shipping_address')}} Vuelva a selecionar el tipo de retiro e intentelo de nuevo colocando la direccion.</p>
</div>
@endif





