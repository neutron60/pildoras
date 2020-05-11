


        @if ($errors->has('name'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('name')}}</p>
    </div>
        @endif





