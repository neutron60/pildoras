


        @if ($errors->has('advertising_url'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('advertising_url')}}</p>
        </div>
        @endif





