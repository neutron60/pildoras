


        @if ($errors->has('image_header'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('image_header')}}</p>
    </div>
        @endif





