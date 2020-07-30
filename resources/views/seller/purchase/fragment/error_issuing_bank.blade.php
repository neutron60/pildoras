@if ($errors->has('issuing_bank'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('issuing_bank')}} Vuelva a selecionar el tipo de pago e intentelo de nuevo</p>
</div>
<p></p>
@endif





