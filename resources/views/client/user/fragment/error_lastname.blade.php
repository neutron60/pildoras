


        @if ($errors->has('lastname'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('lastname')}}</p>
    </div>
        @endif





