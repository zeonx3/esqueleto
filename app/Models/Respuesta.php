<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    
    protected $fillable = [

        'res_nombre','id_pregunta','res_estado','id_productos','res_pregunta','res_tipo'
    ];
}
