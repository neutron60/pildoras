


        @if ($errors->has('department_id'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
        <p> {{$errors->first('department_id')}}</p>
    </div>
        @endif





