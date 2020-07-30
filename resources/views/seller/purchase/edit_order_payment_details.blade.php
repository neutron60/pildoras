@extends('seller.layout')
@section('content')

<h2 class="text-center">ORDEN DE COMPRA - REPORTAR PAGO</h2>
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
            <h5>TIPO DE RETIRO: {{$require_shipping}}</h5>
        </label>
    </div>
</div>
<br>

<!----------------------------------------------------------------------------->


<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>DATOS DEL PAGO:</h5>
        </label>
    </div>
</div>


<br>



<div class="accordion" id="accordionExample">
    <div class="form-row ">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        efectivo
                    </button>
                </h2>
            </div>
        </div>
        <div class="card ml-3">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        deposito
                    </button>
                </h2>
            </div>
        </div>
        <div class="card ml-3">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        transferencia
                    </button>
                </h2>
            </div>
        </div>
        <div class="card ml-3">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        pago movil
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
                    <h5>PAGO EN EFECTIVO: </h5>
                </label>
            </div>
        </div>
        <br>
        <form action="/seller/purchase/update-order-payment-details/{{$purchase->id}}" method="post"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <input type="hidden" name='payment_type' value="efectivo">
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">monto pagado:</label>
                </div>
                <div class="ml-3">
                    <input type="number" maxlength="" pattern="" class="form-control" id="amount_paid"
                        name="amount_paid" value="{{old('amount_paid')}}">
                        <p>mayor o igual que el total</p>

                </div>
            </div>
            <br>

            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">fecha de la transaccion::</label>
                </div>
                <div class="ml-3">
                    <input type="date" maxlength="" pattern="" class="form-control" id="payment_day" name="payment_day"
                        value="{{old('payment_day')}}">
                </div>
            </div>
            <br>
            <button type="submit" class="ml-5">GUARDAR</button>
        </form>

        <br>
    </div>


    <!---------------------------------------------------------------------------------------------------->
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class=" form-row ">
            <div class="">
                <label class="ml-3 " for="nombre">
                    <h5>DEPOSITO: </h5>
                </label>
            </div>
        </div>
        <form action="/seller/purchase/update-order-payment-details/{{$purchase->id}}" method="POST" novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name='payment_type' value="deposito">
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">monto pagado:</label>
                </div>
                <div class="ml-3">
                    <input type="number" maxlength="" pattern="" class="form-control" id="amount_paid"
                        name="amount_paid" value="{{old('amount_paid')}}">
                    <p>mayor o igual que el total</p>
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">banco emisor:</label>
                </div>
                <div class="ml-3">
                    <input type="text" maxlength="" pattern="" class="form-control" id="issuing_bank"
                        name="issuing_bank" value="{{old('issuing_bank')}}">
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">fecha de la transaccion::</label>
                </div>
                <div class="ml-3">
                    <input type="date" maxlength="" pattern="" class="form-control" id="payment_day" name="payment_day"
                        value="{{old('payment_day')}}">
                </div>
            </div>
            <button type="submit" class="ml-5">GUARDAR</button>
        </form>
        <br>
    </div>

    <!------------------------------------------------------------------------------------->

    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class=" form-row ">
            <div class="">
                <label class="ml-3 " for="nombre">
                    <h5>TRANSFERENCIA: </h5>
                </label>
            </div>
        </div>
        <form action="/seller/purchase/update-order-payment-details/{{$purchase->id}}" method="POST" novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row ">
                <input type="hidden" name='payment_type' value="transferencia">

                <div class="ml-3">
                    <label class="" for="nombre">monto pagado:</label>
                </div>
                <div class="ml-3">
                    <input type="number" maxlength="" pattern="" class="form-control" id="amount_paid"
                        name="amount_paid" value="{{('amount_paid')}}">
                        <p>mayor o igual que el total</p>
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">banco emisor:</label>
                </div>
                <div class="ml-3">
                    <input type="text" maxlength="" pattern="" class="form-control" id="issuing_bank"
                        name="issuing_bank" value="{{old('issuing_bank')}}">
                </div>
                <div class="ml-5">
                    <label class="" for="nombre">banco receptor:</label>
                </div>
                <div class="ml-3">
                    <input type="text" maxlength="" pattern="" class="form-control" id="receiving_bank"
                        name="receiving_bank" value="{{old('receiving_bank')}}">
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">fecha de la transaccion::</label>
                </div>
                <div class="ml-3">
                    <input type="date" maxlength="" pattern="" class="form-control" id="payment_day" name="payment_day"
                        value="{{old('payment_day')}}">
                </div>

                <div class="ml-5">
                    <label class="" for="nombre">numero de operacion:</label>
                </div>
                <div class="ml-3">
                    <div class="ml-3">
                        <input type="text" maxlength="" pattern="" class="form-control" id="operation_number"
                            name="operation_number" value="{{old('operation_number')}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="ml-5">GUARDAR</button>
        </form>

        <br>
    </div>

    <!--------------------------------------------------------------------------------------->
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
        <div class=" form-row ">
            <div class="">
                <label class="ml-3 " for="nombre">
                    <h5>PAGO MOVIL: </h5>
                </label>
            </div>
        </div>
        <form action="/seller/purchase/update-order-payment-details/{{$purchase->id}}" method="POST" novalidate="novalidate">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row ">
                <input type="hidden" name='payment_type' value="pago_movil">

                <div class="ml-3">
                    <label class="" for="nombre">monto pagado:</label>
                </div>
                <div class="ml-3">
                    <input type="number" maxlength="" pattern="" class="form-control" id="amount_paid"
                        name="amount_paid" value="{{old('amount_paid')}}">
                        <p>mayor o igual que el total</p>
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">banco emisor:</label>
                </div>
                <div class="ml-3">
                    <input type="text" maxlength="" pattern="" class="form-control" id="issuing_bank"
                        name="issuing_bank" value="{{old('issuing_bank')}}">
                </div>
                <div class="ml-5">
                    <label class="" for="nombre">banco receptor:</label>
                </div>
                <div class="ml-3">
                    <input type="text" maxlength="" pattern="" class="form-control" id="receiving_bank"
                        name="receiving_bank" value="{{old('receiving_bank')}}">
                </div>
            </div>
            <br>
            <div class="form-row ">
                <div class="ml-3">
                    <label class="" for="nombre">fecha de la transaccion::</label>
                </div>
                <div class="ml-3">
                    <input type="date" maxlength="" pattern="" class="form-control" id="payment_day" name="payment_day"
                        value="{{old('payment_day')}}">
                </div>
                <div class="ml-5">
                    <label class="" for="nombre">numero de operacion:</label>
                </div>
                <div class="ml-3">
                    <div class="ml-3">
                        <input type="text" maxlength="" pattern="" class="form-control" id="operation_number"
                            name="operation_number" value="{{old('operation_number')}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="ml-5">GUARDAR</button>
        </form>

        <br>
    </div>

</div>
@include('seller.purchase.fragment.error_amount_paid')
@include('seller.purchase.fragment.error_issuing_bank')
@include('seller.purchase.fragment.error_receiving_bank')
@include('seller.purchase.fragment.error_payment_day')
@include('seller.purchase.fragment.error_operation_number')

<br><br><br>



<div class="form-row ">
    <a class="btn btn-primary" href="{{URL::previous()}}">retornar</a>
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
