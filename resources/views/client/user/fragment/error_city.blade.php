


        @if ($errors->has('city'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('city')}}</p>
    </div>
        @endif





