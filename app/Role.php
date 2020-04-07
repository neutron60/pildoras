<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nombre_rol',
    ];
    public function user(){
        return $this->hasOne("App\User");
    }
}
