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
<br><br><br>
<div class="ml-4">
    <a href="/seller/purchase"><p class="font-weight-bold text-dark">Vendedor</p></a>
    <a href="/seller/purchase/index-order-requested"><p class="text-dark">ordenes, reportar pago</p></a>
    <a href="/seller/purchase/index-order-verified-payment"><p class="text-dark">ordenes, verificar pago</p></a>
    <a href="/seller/purchase/index-order-assign-invoice"><p class="text-dark">ordenes, asignar factura</p></a>
    <a href="/seller/purchase/index-sales"><p class="text-dark">ventas</p></a>
    <br>

</div>

