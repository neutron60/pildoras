


        @if ($errors->has('stock'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('stock')}}</p>
    </div>
        @endif





