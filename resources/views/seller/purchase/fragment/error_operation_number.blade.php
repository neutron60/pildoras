@if ($errors->has('operation_number'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('operation_number')}} Vuelva a selecionar el tipo de pago e intentelo de nuevo</p>
</div>
<p></p>
@endif





