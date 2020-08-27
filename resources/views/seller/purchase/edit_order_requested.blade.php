
@extends('seller.layout')

@section('content')



<h2 class="text-center">ORDEN DE COMPRA - CAMBIAR DIRECCION</h2>
<br>

<div class="form-row float-right mr-5">
    <div class="">
        <label class="" for="nombre">
            <h5>fecha: </h5>
        </label>
    </div>
    <div class="">
        <label class="ml-2" for="nombre">
            <h5>{{$created_at}}</h5>
        </label>
    </div>
</div>
<div class="clearfix"></div>
<div class=" form-row float-right mr-5">
    <div class="">
        <label class=" " for="nombre">
            <h5>numero de orden:</h5>
        </label>
    </div>
    <div class="">
        <label class="ml-2 " for="nombre">
            <h5>{{$purchase->order_number}}</h5>
        </label>
    </div>
</div>
<br>

@include('seller.purchase.basic_order')

<div class=" form-row ">
    <div class="">
        <label class="ml-3 " for="nombre">
            <h4>TIPO DE RETIRO: {{$message}}</h4>
        </label>
    </div>
</div>
<br>

<!----------------------------------------------------------------------------------->
    @if($purchase->requires_shipping == 0)

    <h5>LA MERCANCIA SE RETIRARA POR EN LA TIENDA</h5>
    @endif

    <!--------------------------------------------------------------------------------->

        @if($purchase->requires_shipping == 1 || $purchase->requires_shipping == 2)

        @include('seller.purchase.basic_order_shipping_information')

        <br>
        @endif
        <br>

        <div class="accordion" id="accordionExample">
            <div class="form-row ">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                retiro en tienda
                            </button>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                envio a oficina de correo
                            </button>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                envio a direccion registrada
                            </button>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                envio a nueva direccion
                            </button>
                        </h2>
                    </div>

                </div>
            </div>
            <br><br>

            <!------------------------------------------------------------------------------------------------>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class=" form-row ">
                        <div class="">
                            <label class="ml-3 " for="nombre">
                                <h5>TIPO DE RETIRO: retiro en tienda</h5>
                            </label>
                        </div>
                    </div>
                    <br>
                    <form action="/seller/purchase/update-order-requested/{{$purchase->id}}" method="POST"novalidate="novalidate" >
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <h5>LA MERCANCIA SE RETIRARA EN LA TIENDA</h5>
                        <input class="" type="hidden" name="requires_shipping" value="0">
                        <br>
                        <button class="ml-5" type="submit">guardar</button>
                    </form>
                </div>

                <!---------------------------------------------------------------------------------------------------->
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class=" form-row">
                            <div class="ml-3">
                                <label class="" for="nombre">
                                    <h4>ENVIO A OFICINA DE CORREO:</h4>
                                </label>
                            </div>
                        </div>
                        <form action="/seller/purchase/update-order-requested/{{$purchase->id}}" method="POST"
                            novalidate="novalidate" id="validar_forma">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">empresa de envio:</label>
                                </div>
                                <div class="ml-3">
                                    <select id="courier_name" name="courier_name" class="form-control required">
                                        <option selected value="{{old('courier_name')}}">{{old('courier_name')}}</option>
                                        <option value="MRW">MRW</option>
                                        <option value="TEALCA">TEALCA</option>
                                        <option value="DOMESA">DOMESA</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">Direccion oficina:</label>
                                </div>
                                <div class="ml-3 ">
                                    <input type="text" maxlength="500" pattern="" class="form-control required" size="60"
                                        id="shipping_address" size="30" name="shipping_address"
                                        value="{{old('shipping_address')}}">
                                </div>
                            </div>
                            <br>
                            <div class="form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">Ciudad:</label>
                                </div>
                                <div class="ml-3 ">
                                    <input type="text" maxlength="50" pattern="" class="form-control required" id="shipping_city"
                                        size="10" name="shipping_city" value="{{old('shipping_city')}}">
                                </div>
                            </div>
                            <br>
                            <div class="form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">estado:</label>
                                </div>
                                <div class="ml-3 ">
                                    <select id="shipping_state" class="form-control required" name="shipping_state">
                                        <option selected value="{{old('shipping_state')}}">{{old('shipping_state')}}</option>
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
                                </div>
                            </div>
                            <br>
                            <div class="form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">Codigo postal:</label>
                                </div>
                                <div class="ml-3 ">
                                    <input type="text" maxlength="50" pattern="" class="form-control required"
                                        id="shipping_zip_code" size="10" name="shipping_zip_code"
                                        value="{{old('shipping_zip_code')}}">
                                </div>
                            </div>
                            <br>

                            <input class="" type="hidden" name="requires_shipping" value="1">
                            <button type="submit" class="ml-5">guardar</button>
                            <button type="reset" class="ml-5">borrar</button>
                        </form>

                    </div>

                    <!------------------------------------------------------------------------------------->

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class=" form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">
                                        <h4>ENVIO A DIRECCION REGISTRADA:</h4>
                                    </label>
                                </div>
                            </div>
                            <form action="/seller/purchase/update-order-requested/{{$purchase->id}}" method="POST"
                                novalidate="novalidate" id="validar_forma4">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">empresa de envio:</label>
                                    </div>
                                    <div class="ml-3">
                                        <select id="courier_name" name="courier_name" class="form-control required">
                                            <option selected value="{{old('courier_name')}}">{{old('courier_name')}}</option>
                                            <option value="MRW">MRW</option>
                                            <option value="TEALCA">TEALCA</option>
                                            <option value="DOMESA">DOMESA</option>
                                        </select>

                                    </div>
                                </div>
                                <br>
                                <div class="form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">Direccion:</label>
                                    </div>
                                    <div class="ml-3 ">
                                        <label for="">{{$user->address}}</label>
                                        <input type="hidden" name="shipping_address" value="{{$user->address}}">
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">Ciudad:</label>
                                    </div>
                                    <div class="ml-3 ">
                                        <label for="">{{$user->city}}</label>
                                        <input type="hidden" name="shipping_city" value="{{$user->city}}">
                                    </div>
                                </div>
                                <div class="form-row ">

                                    <div class="ml-3">
                                        <label class="" for="nombre">estado:</label>
                                    </div>
                                    <div class="ml-3 ">
                                        <label for="">{{$user->state}}</label>
                                        <input type="hidden" name="shipping_state" value="{{$user->state}}">
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">Codigo postal:</label>
                                    </div>
                                    <div class="ml-3 ">
                                        <label for="">{{$user->zip_code}}</label>
                                        <input type="hidden" name="shipping_zip_code" value="{{$user->zip_code}}">
                                    </div>
                                </div>
                                <div class=" form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">
                                            <p>Nota:Si no tiene direccion registrada debe primero registrar su
                                                direccion (mis datos/cambiar direccion) o seleccionar la opcion de envio a nueva direccion</p>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <input class="" type="hidden" name="requires_shipping" value="2">
                                <button type="submit" class="ml-5" id="registered_address">guardar</button>
                            </form>
                        </div>

                        <!--------------------------------------------------------------------------------------->
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class=" form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">
                                            <h4>ENVIO A NUEVA DIRECCION:</h4>
                                        </label>
                                    </div>
                                </div>
                                <form action="/seller/purchase/update-order-requested/{{$purchase->id}}" method="POST"
                                    novalidate="novalidate" id="validar_forma1">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">empresa de envio:</label>
                                        </div>
                                        <div class="ml-3">
                                            <select id="courier_name" name="courier_name" class="form-control required">
                                                <option selected value="{{old('courier_name')}}">{{old('courier_name')}}</option>
                                                <option value="MRW">MRW</option>
                                                <option value="TEALCA">TEALCA</option>
                                                <option value="DOMESA">DOMESA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">Direccion:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <input type="text" maxlength="500" pattern="" class="form-control required" size="60"
                                                id="shipping_address" size="50" name="shipping_address"
                                                value="{{old('shipping_address')}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">Ciudad:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <input type="text" maxlength="50" pattern="" class="form-control required"
                                                id="shipping_city" size="10" name="shipping_city"
                                                value="{{old('shipping_city')}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">estado:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <select id="shipping_state" class="form-control required" name="shipping_state">
                                                <option selected value="{{old('shipping_state')}}">{{old('shipping_state')}}</option>
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
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">Codigo postal:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <input type="text" maxlength="50" pattern="" class="form-control required"
                                                id="shipping_zip_code" size="8" name="shipping_zip_code"
                                                value="{{old('shipping_zip_code')}}">
                                        </div>
                                    </div>
                                    <br>
                                    <input class="" type="hidden" name="requires_shipping" value="2">
                                    <button type="submit" class="ml-5">guardar</button>
                                    <button type="reset" class="ml-5">borrar</button>
                                </form>
                            </div>
        </div>

        @include('seller.purchase.fragment.error_courier_name')
        @include('seller.purchase.fragment.error_shipping_address')
        @include('seller.purchase.fragment.error_shipping_city')
        @include('seller.purchase.fragment.error_shipping_state')

        <!--------------------------------------------------------------------------------------------->
            <br><br>
            <div class="form-row ml-3 mr-5">
                <div>
                    <a class="btn btn-primary mr-5" href="{{URL::previous()}}" id="">retornar</a>
                </div>
                <div class="ml-5">
                    <form action="/seller/purchase/{{$purchase->id}}" method="POST" enctype="multipart/form-data"
                        novalidate="novalidate" id="eliminar" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" name="eliminar orden" value="eliminar orden"  class="btn btn-secondary ml-5" id="confirmar_borrar">
                        <!--el metodo es exigido por destroy-->
                    </form>
                </div>
            </div>


            @endsection



