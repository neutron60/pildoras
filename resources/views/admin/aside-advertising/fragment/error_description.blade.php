


        @if ($errors->has('description'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('description')}}</p>
    </div>
        @endif





