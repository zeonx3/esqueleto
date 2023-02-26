<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metododepago extends Model
{  
    protected $fillable = [
    
        'met_nombre',
        'met_descripcion',
        'met_tipo',
        'met_imagen'

    ];
    
}
