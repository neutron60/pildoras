


        @if ($errors->has('who_are'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('who_are')}}</p>
    </div>
        @endif





