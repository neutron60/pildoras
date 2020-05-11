<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $dates=['created_at','updated_at',];

    protected $fillable = [
        'name', 'department_id', 'is_active'
    ];

    public function department(){
        return $this->belongsTo('App\Department');
        }

    public function categories(){
        return $this->hasMany('App\Category');
        }

}
