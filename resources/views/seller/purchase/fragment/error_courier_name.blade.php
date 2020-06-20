@if ($errors->has('courier_name'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
<p> {{$errors->first('courier_name')}}</p>
</div>
@endif





