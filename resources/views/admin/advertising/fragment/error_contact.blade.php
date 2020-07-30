


        @if ($errors->has('contact'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('contact')}}</p>
    </div>
        @endif





