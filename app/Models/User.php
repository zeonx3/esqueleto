<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable,  HasApiTokens; 

    protected $table  = 'usuarios';

    protected $fillable = [

        'usu_mail', 'usu_password','id_empresa'

    ];


}
