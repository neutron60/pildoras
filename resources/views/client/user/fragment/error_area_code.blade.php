


        @if ($errors->has('area_code'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('area_code')}}</p>
    </div>
        @endif





