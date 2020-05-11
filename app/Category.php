<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

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
