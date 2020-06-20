


        @if ($errors->has('id_number'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('id_number')}}</p>
    </div>
        @endif





