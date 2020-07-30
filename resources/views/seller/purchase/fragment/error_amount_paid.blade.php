@if ($errors->has('amount_paid'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('amount_paid')}} Vuelva a selecionar el tipo de pago e intentelo de nuevo</p>
</div>
@endif





