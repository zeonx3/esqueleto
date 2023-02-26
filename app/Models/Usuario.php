<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [

        'usu_nombre',
        'usu_username',
        'usu_appaterno',
        'usu_apmaterno',
        'usu_rut',
        'usu_segnombre',
        'id_mail',
        'usu_password',
        'id_direccion',
        'id_telefono',
        'usu_imagen',
        'id_empresa'

    ];
}
