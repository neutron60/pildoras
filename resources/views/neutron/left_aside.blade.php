<br><br>

<style>
.letra{
font-size: 1rem
}

@media screen and (max-width: 992px) {
    .letra{
font-size: 0.8rem
}
        }



</style>

@empty($departments)
@else

<div class="ml-4">
    <p class="font-weight-bold text-dark letra">Departamentos</p>
    @foreach($departments as $department)
    <p class="mt-n1 letra">
        <a href="/neutron/article-list-department/{{$department->id}}" type="" class="text-dark"> {{$department->name}}
        </a>
    </p>
    @endforeach
</div>
<br><br><br>
@endempty



