@extends('client.layout')
@section('content')

<h2 class="text-center">ORDEN DE COMPRA</h2>

@include('client.purchase.basic_order')



<label class='ml-3' for="">tipo de retiro:</label>

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
    <form action="/client/purchase/store-order-withdrawal" method="POST" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
        <h4>RETIRO EN TIENDA</h4>
        <input class="" type="hidden" name="requires_shipping" value="0">
        <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <h5> Puede dirigirse a nuestra tienda a retirar su producto en el horario de 8am a 5pm</h5>
        <h5> En su email recibira los detalles de la direccion de nuestra tienda</h5>
        <h5> Puede pagar en efectivo, pago movil o transferencia</h5>
        <br>
        <button class="ml-5" type="submit">confirmar su compra</button>
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
    <form action="/client/purchase/store-order-courier" method="POST" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
        <div class="form-row ">
            <div class="ml-3">
                <label class="" for="nombre">empresa de envio:</label>
            </div>
            <div class="ml-3">
                <select id="courier_name" name="courier_name" class="form-control">
                    <option selected value="">seleccione</option>
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
                <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_address"
                    name="shipping_address" value="{{old('shippin_address')}}">
                    @include('seller.purchase.fragment.error_shipping_address')
            </div>
        </div>
        <br>
        <div class="form-row ">
            <div class="ml-3">
                <label class="" for="nombre">Ciudad:</label>
            </div>
            <div class="ml-3 ">
                <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_city"
                    name="shipping_city" value="{{old('shipping_city')}}">
                    @include('seller.purchase.fragment.error_shipping_city')
            </div>
            <div class="ml-5">
                <label class="" for="nombre">estado:</label>
            </div>
            <div class="ml-3 ">
                <select id="shipping_state" class="form-control" name="shipping_state"
                value="{{old('shipping_state')}}">
                <option> </option>
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
                <input type="text" maxlength="50" pattern="" class="form-control" id="shipping_zip_code"
                    name="shipping_zip_code" value="{{old('shipping_zip_code')}}">
            </div>
        </div>
        <br>

        <input class="" type="hidden" name="requires_shipping" value="1">
        <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <button type="submit" class="ml-5">confirmar compra</button>
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
        <form action="/client/purchase/store-order-address" method="POST" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">empresa de envio:</label>
                </div>
                <div class="ml-3">
                    <select id="courier_name" name="courier_name" class="form-control">
                        <option selected value="">seleccione</option>
                        <option value="MRW">MRW</option>
                        <option value="TEALCA">TEALCA</option>
                        <option value="DOMESA">DOMESA</option>
                    </select>
                    @include('seller.purchase.fragment.error_courier_name')
                </div>
            </div>
            <br>
            <div class=" form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">
                        <h5>su compra se enviara a la direccion registrada una vez complete el proceso de pago</h5>
                        <h5>en su email recibira los detalles para completar la compra</h5>
                    </label>
                </div>
            </div>

            <input class="" type="hidden" name="requires_shipping" value="2">
            <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <button type="submit" class="ml-5">confirmar compra</button>
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
        <form action="/client/purchase/store-order-courier" method="POST" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">empresa de envio:</label>
                </div>
                <div class="ml-3">
                    <select id="courier_name" name="courier_name" class="form-control">
                        <option selected value="">seleccione</option>
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
                        name="shipping_address" value="{{old('shipping_address')}}">
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
                        name="shipping_city" value="{{old('shipping_city')}}">
                        @include('seller.purchase.fragment.error_shipping_city')
                </div>
                <div class="ml-5">
                    <label class="" for="nombre">estado:</label>
                </div>
                <div class="ml-3 ">
                    <select id="shipping_state" class="form-control" name="shipping_state" value="{{old('shipping_state')}}">
                        <option> </option>
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
                        name="shipping_zip_code" value="{{old('shipping_zip_code')}}">
                </div>
            </div>
            <br>
            <div class=" form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">
                        <h5>su compra se enviara a la direccion indicada una vez complete el proceso de pago</h5>
                        <h5>en su email recibira los detalles para completar la compra</h5>
                    </label>
                </div>
            </div>

            <input class="" type="hidden" name="requires_shipping" value="1">
            <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <button type="submit" class="ml-5">confirmar compra</button>
        </form>
    </div>
</div>


@endsection
