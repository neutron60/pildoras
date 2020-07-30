@if ($errors->has('courier_name'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('courier_name')}} Vuelva a selecionar el tipo de retiro e intentelo de nuevo colocando la oficina de correo</p>
</div>
<p></p>
@endif





