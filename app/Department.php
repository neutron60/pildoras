<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{


    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'name', 'title', 'description', 'image', 'is_active'
    ];

    public function sections(){
        return $this->hasMany('App\Section');
        }
}
