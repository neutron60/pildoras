@if ($errors->has('shipping_state'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('shipping_state')}} Vuelva a selecionar el tipo de retiro e intentelo de nuevo colocando el estado.  </p>
</div>
@endif





