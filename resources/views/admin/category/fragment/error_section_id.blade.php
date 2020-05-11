


        @if ($errors->has('section_id'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('section_id')}}</p>
    </div>
        @endif





