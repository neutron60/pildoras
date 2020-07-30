@if ($errors->has('payment_day'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('payment_day')}} Vuelva a selecionar el tipo de pago e intentelo de nuevo</p>
</div>
<p></p>
@endif





