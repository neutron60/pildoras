<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'name', 'title', 'description', 'image', 'category', 'department_id', 'status'
    ];
}
