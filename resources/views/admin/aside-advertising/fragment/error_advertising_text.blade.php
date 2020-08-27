


        @if ($errors->has('advertising_text'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('advertising_text')}}</p>
        </div>
        @endif





