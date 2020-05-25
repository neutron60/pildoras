


        @if ($errors->has('price'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('price')}}</p>
    </div>
        @endif





