<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Aut_registro extends Model
{

    protected $fillable = [
        
        'id_autoatencion',
        'id_pregunta1',
        'id_pregunta2',
        'id_respuesta1',
        'id_respuesta2',
        'id_producto',
        'tot_inicio',
        'tot_final',
    ];

}
