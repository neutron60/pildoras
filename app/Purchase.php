<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{



    protected $fillable = [
        'user_id', 'order_number', 'invoice_number', 'payment_type', 'amount_paid', 'issuing_bank', 'receiving_bank', 'payment_day', 'operation_number', 'verified_payment', 'courier_name', 'courier_office', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip_code', 'requires_shipping'
    ];

    protected $dates = [
        'payment_day'
    ];

    public function purchase_details(){
        return $this->hasMany('App\PurchaseDetail');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
