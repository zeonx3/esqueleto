<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursale extends Model
{
    protected $fillable = [
        'id_empresa',
        'id_direccion',
        'suc_nombre',
        'suc_contacto',
        'suc_numero',
        'suc_estado',
        'suc_tipo'

    ];
}
