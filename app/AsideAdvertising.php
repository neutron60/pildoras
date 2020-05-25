<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsideAdvertising extends Model
{
    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'advertising_text', 'advertising_image', 'advertising_url'
    ];
}
