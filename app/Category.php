<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{


    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'name', 'is_active', 'section_id'
    ];

    public function section(){
        return $this->belongsTo('App\Section');
        }

    public function articles(){
        return $this->hasMany('App\Article');
        }
}
