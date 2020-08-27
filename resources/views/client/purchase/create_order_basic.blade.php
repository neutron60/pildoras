<h2 class="text-center">ORDEN DE COMPRA</h2>

@include('client.purchase.basic_order')



<h3 class='ml-3' for="">TIPO DE RETIRO:</h3>

<br>

<!*********************************************************************>
    <div class="accordion" id="accordionExample">

        <div class="form-row">

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
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            envio a oficina de correo
                        </button>
                    </h2>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            envio a direccion registrada
                        </button>
                    </h2>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            envio a nueva direccion
                        </button>
                    </h2>
                </div>
            </div>

        </div>



        <!*********************************************************************>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="/client/purchase/store-order" method="POST" enctype="multipart/form-data"
                        novalidate="novalidate">
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

                    <br><br>
                    <div class="form-row ml-3">
                        <a href="/neutron">
                            <button class="btn btn-secondary" type="button"> cancelar compra </button>
                        </a>
                    </div>
                </div>
            </div>

            <!*********************************************************************>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class=" form-row ">
                            <div class="ml-3">
                                <label class="" for="nombre">
                                    <h4>ENVIO A OFICINA DE CORREO:</h4>
                                </label>
                            </div>
                        </div>

                        @include('client.purchase.create_order_basic_addressee')
                        <br>

                        <form action="/client/purchase/store-order" method="POST" enctype="multipart/form-data"
                            novalidate="novalidate" id="validar_forma">
                            @csrf
                            <div class="form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">empresa de envio:</label>
                                </div>
                                <div class="ml-3">
                                    <select id="courier_name" name="courier_name" class="form-control required">
                                        <option value="{{old('courier_name')}}" > {{old('courier_name')}}</option>
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
                                    <input type="text" maxlength="50" pattern="" class="form-control required"
                                        id="shipping_address" size="60" name="shipping_address"
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
                                        id="shipping_city" name="shipping_city" value="{{old('shipping_city')}}">

                                </div>
                                <div class="ml-5">
                                    <label class="" for="nombre">estado:</label>
                                </div>
                                <div class="ml-3 ">
                                    <select id="shipping_state" class="form-control required" name="shipping_state">
                                        <option value="{{old('shipping_state')}}" > {{old('shipping_state')}}</option>
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
                                <div class="ml-5">
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
                            <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
                            <input type="hidden" name="article_id" value="{{$article->id}}">
                            <button type="submit" class="ml-5">confirmar compra</button>
                        </form>
                        <br><br>
                        <div class="form-row ml-3">
                            <a href="/neutron">
                                <button class="btn btn-secondary" type="button"> cancelar compra </button>
                            </a>
                        </div>
                    </div>
                </div>

                <!*********************************************************************>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class=" form-row ">
                                <div class="ml-3">
                                    <label class="" for="nombre">
                                        <h4>ENVIO A DIRECCION REGISTRADA:</h4>
                                    </label>
                                </div>
                            </div>

                            @include('client.purchase.create_order_basic_addressee')
                            <br>
                            <form action="/client/purchase/store-order" method="POST" enctype="multipart/form-data"
                                novalidate="novalidate" id="validar_forma1">
                                @csrf
                                <div class="form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">empresa de envio:</label>
                                    </div>
                                    <div class="ml-3">
                                        <select id="courier_name" name="courier_name" class="form-control required">
                                            <option value="{{old('courier_name')}}" > {{old('courier_name')}}</option>
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
                                        <input type="hidden" name="shipping_address" id="shipping_address"
                                            value="{{$user->address}}">
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
                                    <div class="ml-5">
                                        <label class="" for="nombre">estado:</label>
                                    </div>
                                    <div class="ml-3 ">
                                        <label for="">{{$user->state}}</label>
                                        <input type="hidden" name="shipping_state" value="{{$user->state}}">
                                    </div>
                                    <div class="ml-5">
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
                                            <p>Nota:Si no tiene direccion registrada debe primero registar su direccion
                                                (mis datos/cambiar direccion) o seleccionar la opcion de envio a nueva
                                                direccion</p>
                                        </label>
                                    </div>
                                </div>

                                <input class="" type="hidden" name="requires_shipping" value="2">
                                <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <button type="submit" class="ml-5">confirmar compra</button>
                            </form>
                            <br><br>
                            <div class="form-row ml-3">
                                <a href="/neutron">
                                    <button class="btn btn-secondary" type="button" id="registered_address"> cancelar
                                        compra </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!*********************************************************************>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div class=" form-row ">
                                    <div class="ml-3">
                                        <label class="" for="nombre">
                                            <h4>ENVIO A NUEVA DIRECCION:</h4>
                                        </label>
                                    </div>
                                </div>

                                @include('client.purchase.create_order_basic_addressee')
                                <br>
                                <form action="/client/purchase/store-order" method="POST" enctype="multipart/form-data"
                                    novalidate="" id="validar_forma4">
                                    @csrf
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">empresa de envio:</label>
                                        </div>
                                        <div class="ml-3">
                                            <select id="courier_name" name="courier_name" class="form-control required">
                                                <option value="{{old('courier_name')}}" > {{old('courier_name')}}</option>
                                                <option value="MRW">MRW</option>
                                                <option value="TEALCA">TEALCA</option>
                                                <option value="DOMESA">DOMESA</option>
                                            </select>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">Direccion de envio:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <input type="text" maxlength="200" pattern="" class="form-control required"
                                                id="shipping_address" size="60" name="shipping_address"
                                                value="{{old('shipping_address')}}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">Ciudad:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <input type="text" maxlength="50" pattern="[A-Za-z]"
                                                class="form-control required" id="shipping_city" name="shipping_city"
                                                value="{{old('shipping_city')}}">

                                        </div>
                                        <div class="ml-5">
                                            <label class="" for="nombre">estado:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <select id="shipping_state" class="form-control required" name="shipping_state" >
                                                <option value="{{old('shipping_state')}}" > {{old('shipping_state')}}</option>
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
                                        <div class="ml-5">
                                            <label class="" for="nombre">Codigo postal:</label>
                                        </div>
                                        <div class="ml-3 ">
                                            <input type="text" maxlength="50"  class="form-control required"
                                                id="shipping_zip_code" size="10" name="shipping_zip_code"
                                                value="{{old('shipping_zip_code')}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class=" form-row ">
                                        <div class="ml-3">
                                            <label class="" for="nombre">
                                                <h5>su compra se enviara a la direccion indicada una vez complete el
                                                    proceso de pago</h5>
                                                <h5>en su email recibira los detalles para completar la compra</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <input class="" type="hidden" name="requires_shipping" value="2">
                                    <input type="hidden" name="purchased_amount" value="{{$purchased_amount}}">
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                    <button type="submit" class="ml-5">confirmar compra</button>
                                </form>

                                <br><br>
                                <div class="form-row ml-3">
                                    <a href="/neutron">
                                        <button class="btn btn-secondary" type="button"> cancelar compra </button>
                                    </a>
                                </div>
                            </div>
                        </div>

    </div>

    @include('client.purchase.fragment.error_courier_name')
    @include('client.purchase.fragment.error_shipping_address')
    @include('client.purchase.fragment.error_shipping_city')
    @include('client.purchase.fragment.error_shipping_state')
