


        @if ($errors->has('logo'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('logo')}}</p>
    </div>
        @endif





