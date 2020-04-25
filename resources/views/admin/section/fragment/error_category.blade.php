


        @if ($errors->has('category'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('category')}}</p>
    </div>
        @endif





