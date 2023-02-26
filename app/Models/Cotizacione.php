<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacione extends Model
{
    protected $fillable = [
        'id_usuario',
        'id_empresa',
        'cot_bruto',
        'cot_des_total',
        'cot_total',
        'cot_destipo',
        'cot_estado',
    ];
}
