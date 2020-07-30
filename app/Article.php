<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{


    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'name', 'code', 'description', 'image1', 'image2', 'image3', 'brand', 'model', 'size', 'use', 'price', 'stock', 'category_id', 'is_active', 'is_bargain', 'is_new_collection'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function purchase_details(){
        return $this->hasMany('App\PurchaseDetail');
    }
}
