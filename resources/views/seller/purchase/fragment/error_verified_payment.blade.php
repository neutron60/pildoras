@if ($errors->has('verified_payment'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('verified_payment')}}</p>
</div>
@endif





