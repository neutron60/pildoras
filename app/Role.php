<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Role extends Model
{
    protected $fillable = [
        'role_name',
    ];



}
