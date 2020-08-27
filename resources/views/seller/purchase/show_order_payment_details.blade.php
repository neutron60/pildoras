<div class=" form-row ">
    <div class="ml-3">
        <label class="" for="nombre">
            <h5>DATOS DEL PAGO:</h5>
        </label>
    </div>
</div>

<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">tipo de transaccion:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->payment_type}}</label>
    </div>

    <div class="ml-5">
        <label class="" for="nombre">monto pagado:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->amount_paid}}</label>
    </div>
</div>

@if ( $purchase->payment_type <> 'efectivo')
<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">banco emisor::</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->issuing_bank}}</label>
    </div>

    @if ( $purchase->payment_type <> 'deposito')
    <div class="ml-5">
        <label class="" for="nombre">banco receptor:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->receiving_bank}}</label>
    </div>
    @endif
</div>
@endif

<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">fecha de la transaccion::</label>
    </div>
    <div class="ml-3">
        <label for="">{{$payment_day}}</label>
    </div>

    @if ( $purchase->payment_type <> 'efectivo')
    <div class="ml-5">
        <label class="" for="nombre">numero de operacion:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->operation_number}}</label>
    </div>
    @endif
</div>
<br>



<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">pago verificado:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->verified_payment?'si':'no'}}</label>
    </div>
</div>

<div class="form-row ">
    <div class="ml-3">
        <label class="" for="nombre">numero de factura:</label>
    </div>
    <div class="ml-3">
        <label for="">{{$purchase->invoice_number}}</label>
    </div>
</div>
