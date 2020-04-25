<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'name', 'title', 'description', 'image', 'status'
    ];

    public function sections(){
        return $this->hasMany('App\Section');
        }
}
