


        @if ($errors->has('mobil_phone_code'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('mobil_phone_code')}}</p>
    </div>
        @endif





