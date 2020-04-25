<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'brand', 'model', 'size', 'use', 'price', 'stock', 'section_id', 'status'
    ];
}
