@if ($errors->has('invoice_number'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('invoice_number')}}</p>
</div>
@endif





