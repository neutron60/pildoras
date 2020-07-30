




<div class=" form-row ">
    <div class="ml-3">
        <label class=" " for="nombre">
            <h5>COMPRADOR:</h5>
        </label>
    </div>
</div>

<div class="form-row">
    <div class="">
        <label class="ml-3" for="nombre">Nombre:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->name}}  {{$user->lastname}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">cedula:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->id_type}} - {{$user->id_number}}</label>
    </div>
</div>

<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">Direccion:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->address}}</label>
    </div>
</div>

<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">Ciudad:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->city}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">estado:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->state}}</label>
    </div>
    <div class="ml-5">
        <label class="" for="nombre">Codigo postal:</label>
    </div>
    <div class="ml-3 ">
        <label for="">{{$user->zip_code}}</label>
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
<br><br>
<div class=" form-row ">
    <div class="">
        <label class="ml-3 " for="nombre">
            <h5>DATOS DEL PRODUCTO:</h5>
        </label>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th class="text-center" scope="col">item</th>
            <th class="text-center" scope="col">codigo</th>
            <th class="text-center" scope="col">articulo</th>
            <th class="text-center" scope="col">cantidad</th>
            <th class="text-center" scope="col">precio unitario</th>
            <th class="text-center" scope="col">total</th>
        </tr>
    </thead>

    <tbody>


        <tr>
            <td class="text-center" scope="row" width="50px">1</td>

            <td class="text-center" scope="row" width="80px">{{$article_code}}</td>

            <td class="text-center" scope="row" width="200px">{{$purchase_detail->article_name}}</td>

            <td class="text-center" scope="row" width="100px">{{$purchase_detail->purchased_amount}}</td>

            <td class="text-center" scope="row" width="120px">{{$order_calculation['unit_price']}}</td>

            <td class="text-center" scope="row" width="120px">{{$order_calculation['total_price']}}</td>
        </tr>


    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td class="text-center" scope="row" width="50px"></td>

            <td class="text-center" scope="row" width="80px"></td>

            <td class="text-center" scope="row" width="200px"></td>

            <td class="text-center" scope="row" width="100px"></td>

            <td class="text-center" scope="row" width="120px">subtotal</td>

            <td class="text-center" scope="row" width="120px">{{$order_calculation['sub_total']}}</td>
        </tr>
        <tr>
            <td class="text-center" scope="row" width="50px"></td>

            <td class="text-center" scope="row" width="80px"></td>

            <td class="text-center" scope="row" width="200px"></td>

            <td class="text-center" scope="row" width="100px"></td>

            <td class="text-center" scope="row" width="120px">iva</td>

            <td class="text-center" scope="row" width="120px">{{$order_calculation['iva']}}</td>
        </tr>
        <tr>
            <td class="text-center" scope="row" width="50px"></td>

            <td class="text-center" scope="row" width="80px"></td>

            <td class="text-center" scope="row" width="200px"></td>

            <td class="text-center" scope="row" width="100px"></td>

            <td class="text-center" scope="row" width="120px">total</td>

            <td class="text-center" scope="row" width="120px">{{$order_calculation['total']}}</td>
        </tr>
    </tbody>
</table>

<br><br>

