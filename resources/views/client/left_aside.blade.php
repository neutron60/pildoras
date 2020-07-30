<br><br>

@empty($departments)
@else

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
@endempty



