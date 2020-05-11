


        @if ($errors->has('role_name'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('role_name')}}</p>
    </div>
        @endif





