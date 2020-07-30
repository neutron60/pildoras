


        @if ($errors->has('phone_number'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('phone_number')}}</p>
    </div>
        @endif





