@if ($errors->has('payment_type'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('payment_type')}}</p>
</div>
@endif





