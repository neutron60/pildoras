@extends('seller.layout')
@section('content')

@include('client.purchase.basic_order')


<div class="form-row ml-3">
    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample1"
        aria-expanded="false" aria-controls="collapseExample">
        retiro en tienda
    </button>
    <button class="btn btn-secondary ml-3" type="button" data-toggle="collapse" data-target="#collapseExample2"
        aria-expanded="false" aria-controls="collapseExample">
        envio a oficina courier
    </button>
    <button class="btn btn-secondary ml-3" type="button" data-toggle="collapse" data-target="#collapseExample3"
        aria-expanded="false" aria-controls="collapseExample">
        envio a direccion
    </button>
</div>
<!----------------------------------------------------------------------------->

<div class="collapse" id="collapseExample1">
    <br><br>
    <form action="/seller/purchase/update-withdrawal-store/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <h4>LA MERCANCIA SE RETIRARA POR EN LA TIENDA</h4>
        <input class="" type="hidden" name="requires_shipping" value="0">
        <br>
        <button class="ml-5" type="submit">GUARDAR</button>
    </form>
</div>



<!----------------------------------------------------------------------------->
<div class="collapse" id="collapseExample2">
    <br><br>
    <div class=" form-row ">
        <div class="ml-3">
            <label class="" for="nombre">
                <h4>ENVIO A OFICINA COURIER:</h4>
            </label>
        </div>
    </div>
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
    <form action="/seller/purchase/update-sent-courier/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-row ">
            <div class="ml-3">
                <label class="" for="nombre">empresa de envio:</label>
            </div>
            <div class="ml-3">
                <select id="courier_name" name="courier_name" class="form-control">
                    <option selected value="{{$purchase->courier_name}}">{{$purchase->courier_name}}</option>
                    <option value="MRW">MRW</option>
                    <option value="TEALCA">TEALCA</option>
                    <option value="DOMESA">DOMESA</option>
                </select>
                @include('seller.purchase.fragment.error_courier_name')
            </div>
        </div>
        <br>
        <div class="form-row ">
            <div class="ml-3">
                <label class="" for="nombre">Direccion oficina:</label>
            </div>
            <div class="ml-3 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_address" size="30"
                    name="shipping_address" value="{{$purchase->shipping_address}}">
                    @include('seller.purchase.fragment.error_shipping_address')
            </div>
        </div>
        <br>
        <div class="form-row ">
            <div class="ml-3">
                <label class="" for="nombre">Ciudad:</label>
            </div>
            <div class="ml-3 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_city" size="10"
                    name="shipping_city" value="{{$purchase->shipping_city}}">
                    @include('seller.purchase.fragment.error_shipping_city')
            </div>
            <div class="ml-5">
                <label class="" for="nombre">estado:</label>
            </div>
            <div class="ml-3 ">
                <select id="shipping_state" class="form-control" name="shipping_state">
                    <option selected value="{{$purchase->shipping_state}}">{{$purchase->shipping_state}}</option>
                    <option value="amazonas">amazonas</option>
                    <option value="anzoategui">anzoategui</option>
                    <option value="apure">apure</option>
                    <option value="aragua">aragua</option>
                    <option value="barinas">barinas</option>
                    <option value="bolivar">bolivar</option>
                    <option value="carabobo">carabobo</option>
                    <option value="cojedes">cojedes</option>
                    <option value="delta amacuro">delta amacuro</option>
                    <option value="distrito capital">distrito capital</option>
                    <option value="falcon">falcon</option>
                    <option value="guarico">guarico</option>
                    <option value="lara">lara</option>
                    <option value="merida">merida</option>
                    <option value="monagas">monagas</option>
                    <option value="nueva esparta">nueva esparta</option>
                    <option value="portuguesa">portuguesa</option>
                    <option value="sucre">sucre</option>
                    <option value="tachira">tachira</option>
                    <option value="trujillo">trujillo</option>
                    <option value="la guaira">la guaira</option>
                    <option value="yaracuy">yaracuy</option>
                    <option value="zulia">zulia</option>
                </select>
                @include('seller.purchase.fragment.error_shipping_state')
            </div>
            <div class="ml-5">
                <label class="" for="nombre">Codigo postal:</label>
            </div>
            <div class="ml-3 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_zip_code" size="5"
                    name="shipping_zip_code" value="{{$purchase->shipping_zip_code}}">
            </div>
        </div>
        <br>

        <input class="" type="hidden" name="requires_shipping" value="1">
        <button type="submit" class="ml-5">GUARDAR</button>
    </form>
</div>


<!----------------------------------------------------------------------------->

<div class="collapse" id="collapseExample3">
    <br><br>
    <div class=" form-row ">
        <div class="ml-3">
            <label class="" for="nombre">
                <h4>ENVIO A DIRECCION:</h4>
            </label>
        </div>
    </div>
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


    <br>
    <label for="" class="ml-3">desea el envio a</label>
    <button class="btn btn-secondary ml-3" type="button" data-toggle="collapse" data-target="#collapseExample4"
        aria-expanded="false" aria-controls="collapseExample">
        USAR DIRECCION REGISTRADA
    </button>
    <button class="btn btn-secondary ml-3" type="button" data-toggle="collapse" data-target="#collapseExample5"
        aria-expanded="false" aria-controls="collapseExample">
        USAR NUEVA DIRECCION
    </button>

    <!----------------------------------------------------------------------------->

    <div class="collapse" id="collapseExample4">
        <br><br>
        <div class=" form-row ">
            <div class="ml-3">
                <label class="" for="nombre">
                    <h5>ENVIO A DIRECCION REGISTRADA:</h5>
                </label>
            </div>
        </div>
        <form action="/seller/purchase/update-sent-address/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">empresa de envio:</label>
                </div>
                <div class="ml-3">
                    <select id="courier_name" name="courier_name" class="form-control">
                        <option selected value="{{$purchase->courier_name}}">{{$purchase->courier_name}}</option>
                        <option value="MRW">MRW</option>
                        <option value="TEALCA">TEALCA</option>
                        <option value="DOMESA">DOMESA</option>
                    </select>
                    @include('seller.purchase.fragment.error_courier_name')
                </div>
            </div>
            <br>


            <input class="" type="hidden" name="requires_shipping" value="2">
            <button type="submit" class="ml-5">GUARDAR</button>
        </form>
    </div>

    <!----------------------------------------------------------------------------->

    <div class="collapse" id="collapseExample5">
        <br><br>
        <div class=" form-row ">
            <div class="ml-3">
                <label class="" for="nombre">
                    <h5>ENVIO A NUEVA DIRECCION:</h5>
                </label>
            </div>
        </div>
        <form action="/seller/purchase/update-sent-address-new/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">empresa de envio:</label>
                </div>
                <div class="ml-3">
                    <select id="courier_name" name="courier_name" class="form-control">
                        <option selected value="{{$purchase->courier_name}}">{{$purchase->courier_name}}</option>
                        <option value="MRW">MRW</option>
                        <option value="TEALCA">TEALCA</option>
                        <option value="DOMESA">DOMESA</option>
                    </select>
                    @include('seller.purchase.fragment.error_courier_name')
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">Direccion de envio:</label>
                </div>
                <div class="ml-3 ">
                    <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_address"
                        name="shipping_address" value="{{$purchase->shipping_address)}}">
                        @include('seller.purchase.fragment.error_shipping_address')
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">Ciudad:</label>
                </div>
                <div class="ml-3 ">
                    <input type="text" maxlength="50" pattern="[A-Za-z]" class="form-control" id="shipping_city"
                        name="shipping_city" value="{{$purcgase->shipping_city)}}">
                        @include('seller.purchase.fragment.error_shipping_city')
                </div>
                <div class="ml-5">
                    <label class="" for="nombre">estado:</label>
                </div>
                <div class="ml-3 ">
                    <select id="shipping_state" class="form-control" name="shipping_state">
                        <option selected value="{{$purchase->shipping_state}}">{{$purchase->shipping_state}}</option>
                        <option value="amazonas">amazonas</option>
                        <option value="anzoategui">anzoategui</option>
                        <option value="apure">apure</option>
                        <option value="aragua">aragua</option>
                        <option value="barinas">barinas</option>
                        <option value="bolivar">bolivar</option>
                        <option value="carabobo">carabobo</option>
                        <option value="cojedes">cojedes</option>
                        <option value="delta amacuro">delta amacuro</option>
                        <option value="distrito capital">distrito capital</option>
                        <option value="falcon">falcon</option>
                        <option value="guarico">guarico</option>
                        <option value="lara">lara</option>
                        <option value="merida">merida</option>
                        <option value="monagas">monagas</option>
                        <option value="nueva esparta">nueva esparta</option>
                        <option value="portuguesa">portuguesa</option>
                        <option value="sucre">sucre</option>
                        <option value="tachira">tachira</option>
                        <option value="trujillo">trujillo</option>
                        <option value="la guaira">la guaira</option>
                        <option value="yaracuy">yaracuy</option>
                        <option value="zulia">zulia</option>
                    </select>
                    @include('seller.purchase.fragment.error_shipping_state')
                </div>
                <div class="ml-5">
                    <label class="" for="nombre">Codigo postal:</label>
                </div>
                <div class="ml-3 ">
                    <input type="text" maxlength="50" pattern="[A-Za-z]" class="form-control" id="shipping_zip_code"
                        name="shipping_zip_code" value="{{$purchase->shipping_zip_code)}}">
                </div>
            </div>
            <br>


            <input class="" type="hidden" name="requires_shipping" value="1">
            <button type="submit" class="ml-5">GUARDAR</button>
        </form>
    </div>
</div>
<br><br>

<!----------------------------------------------------------------------------->

<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>DATOS DEL PAGO:</h5>
        </label>
    </div>
</div>
<form action="/seller/purchase/update-payment/{{$purchase->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">tipo de transaccion:</label>
        </div>
        <div class="ml-3">
            <select id="payment_type" name="payment_type" class="form-control">
                <option selected value="{{$purchase->payment_type}}">{{$purchase->payment_type}}</option>
                <option value="efectivo">efectivo</option>
                <option value="transferencia">transferencia</option>
                <option value="deposito">deposito</option>
                <option value="pago_movil">pago movil</option>
            </select>
            @include('seller.purchase.fragment.error_payment_type')
        </div>

        <div class="ml-5">
            <label class="" for="nombre">monto pagado:</label>
        </div>
        <div class="ml-3">
            <input type="number" maxlength="" pattern="" class="form-control" id="amount_paid" name="amount_paid"
                value="{{$purchase->amount_paid}}">
                @include('seller.purchase.fragment.error_amount_paid')
        </div>
    </div>
<br>
    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">banco emisor::</label>
        </div>
        <div class="ml-3">
            <input type="text" maxlength="" pattern="" class="form-control" id="issuing_bank" name="issuing_bank"
                value="{{$purchase->issuing_bank}}">
        </div>

        <div class="ml-5">
            <label class="" for="nombre">banco receptor:</label>
        </div>
        <div class="ml-3">
            <input type="text" maxlength="" pattern="" class="form-control" id="receiving_bank" name="receiving_bank"
                value="{{$purchase->receiving_bank}}">
        </div>
    </div>
<br>
    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">fecha de la transaccion::</label>
        </div>
        <div class="ml-3">
            <input type="text" maxlength="" pattern="" class="form-control" id="payment_day" name="payment_day"
                value="{{$purchase->payment_day}}">
        </div>

        <div class="ml-5">
            <label class="" for="nombre">numero de operacion:</label>
        </div>
        <div class="ml-3">
            <div class="ml-3">
                <input type="text" maxlength="" pattern="" class="form-control" id="operation_number"
                    name="operation_number" value="{{$purchase->operation_number}}">
            </div>
        </div>
    </div>
    <button type="submit" class="ml-5">GUARDAR</button>
</form>

<br>
<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>VERIFICACION DEL PAGO:</h5>
        </label>
    </div>
</div>
<form action="/seller/purchase/update-verified-payment/{{$purchase->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="ml-3">
        <label class="" for="nombre">pago verificado:</label>
    </div>
    <div class="ml-3">
        <select id="verified_payment" name="verified_payment" class="form-control" >
            <option selected value="{{$purchase->verified_payment}}">{{$purchase->verified_payment?'si':'no'}}</option>
            <option value="1">si</option>
            <option value="0">no</option>
        </select>
        @include('seller.purchase.fragment.error_verified_payment')
    </div>
<br>
    <button type="submit" class="ml-5">GUARDAR</button>
</form>


<br>
<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>DATOS DE LA FACTURA:</h5>
        </label>
    </div>
</div>
<form action="/seller/purchase/update-invoice/{{$purchase->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-row ">
        <div class="ml-3">
            <label class="" for="nombre">numero de factura:</label>
        </div>
        <div class="ml-3">
            <input type="text" maxlength="" pattern="" class="form-control" id="invoice_number" name="invoice_number"
                value="{{$purchase->invoice_number}}">
                @include('seller.purchase.fragment.error_invoice_number')
        </div>
    </div>
    <button type="submit" class="ml-5">GUARDAR</button>
</form>


<br>

<div class="form-row ">
<a class="btn btn-secondary" href="{{route('purchase.index')}}">ver ordenes </a>
<div class="ml-5">
    <form action="/seller/purchase/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
        novalidate="novalidate">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="eliminar orden" value="eliminar orden" id="" class="btn btn-secondary ml-5">
        <!--el metodo es exigido por destroy-->
    </form>
</div>
</div>








@endsection
