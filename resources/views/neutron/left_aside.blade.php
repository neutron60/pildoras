<br><br>
<div class="ml-4">
    <p class="font-weight-bold text-dark">Departamentos</p>
    @foreach($departments as $department)
    <p class="mt-n1">
        <a href="/neutron/article-list-department/{{$department->id}}" type="" class="text-dark"> {{$department->name}}
        </a>
    </p>
    @endforeach
</div>
<br><br><br>
<div class="ml-4">
    <p class="font-weight-bold text-dark">Precios</p>
    <p class="mt-n1">
        <a href="/neutron/section/create" type="" class="text-dark">menor a mayor</a>
    </p>
    <p class="mt-n1">
        <a href="/admin/section/create" type="" class="text-dark">mayor a menor</a>
    </p>
    <div class="form-row">
        <input type="number" min="100" max="999999999" class="form-control ml-2" id="id_number" name="id_number"
            value="" placeholder="minimo">
        <label for="">--</label>
        <input type="number" min="100" max="999999999" class="form-control ml-2" id="id_number" name="id_number"
            value="" placeholder="maximo">
    </div>
</div>

<br><br><br>
<div class="ml-4">
   <a href="/admin/advertising"> <p class="font-weight-bold text-dark">administrador</p></a>
    <a href="/seller/purchase"><p class="font-weight-bold text-dark">vendedor</p></a>
    <a href="/client/purchase"><p class="font-weight-bold text-dark">cliente</p></a>
</div>
