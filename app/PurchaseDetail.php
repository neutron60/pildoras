<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'purchase_id', 'article_id', 'article_name', 'price', 'purchased_amount', 'iva'
    ];

    public function purchase(){
        return $this->belongsTo('App\Purchase');
        }

    public function article(){
        return $this->belongsTo('App\Article');
        }
}
