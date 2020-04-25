


        @if ($errors->has('title'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('title')}}</p>
    </div>
        @endif





