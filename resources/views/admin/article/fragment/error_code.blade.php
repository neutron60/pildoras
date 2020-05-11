


        @if ($errors->has('code'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('code')}}</p>
        </div>
        @endif





