<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Advertising extends Model
{
    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'advertising_header', 'image_header', 'bargain_header', 'new_collection_header'
    ];

}
