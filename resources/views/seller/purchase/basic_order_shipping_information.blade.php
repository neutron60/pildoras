
<div class=" form-row ">
    <div class="ml-3">
        <label class=" " for="nombre">
            <h5>DATOS DE ENVIO:</h5>
        </label>
    </div>
</div>
<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">enviar a:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->name}} {{$user->lastname}}</label>
    </div>
    <div class="ml-3">
        <label class="" for="nombre">cedula:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->id_type}} - {{$user->id_number}}</label>
    </div>
</div>
<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">telf. fijo:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->area_code}} {{$user->phone_number}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">telf. celular:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->mobil_phone_code}} {{$user->mobil_phone}}</label>
    </div>
</div>

    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">empresa de envio:</label>
        </div>
        <div class="ml-3">
            <label for="">{{$purchase->courier_name}}</label>
        </div>
    </div>

    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">Direccion:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_address}}</label>
        </div>
    </div>

    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">Ciudad:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_city}}</label>
        </div>
        <div class="ml-5">
            <label class="" for="nombre">estado:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_state}}</label>
        </div>
        <div class="ml-5">
            <label class="" for="nombre">Codigo postal:</label>
        </div>
        <div class="ml-3 ">
            <label for="">{{$purchase->shipping_zip_code}}</label>
        </div>
    </div>
