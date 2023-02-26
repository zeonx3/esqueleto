<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cantidade extends Model
{
    protected $fillable = [
        'id_producto',
        'id_sucursal',
        'sto_cantidad'
    ];
}
