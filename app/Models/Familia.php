<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = [
        'nombre',
        'id_empresa',
        'padres',
        'estado',
        'imagen'
        ];
}
