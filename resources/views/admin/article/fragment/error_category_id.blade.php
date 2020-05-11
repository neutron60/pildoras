


        @if ($errors->has('category_id'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('category_id')}}</p>
    </div>
        @endif





