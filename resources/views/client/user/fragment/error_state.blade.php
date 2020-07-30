


        @if ($errors->has('state'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('state')}}</p>
    </div>
        @endif





