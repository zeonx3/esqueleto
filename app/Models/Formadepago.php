<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formadepago extends Model
{
    protected $fillable = [

        'id_empresa',
        'fmp_nombre',
        'fmp_sii',
        'fmp_estado'
  
      ];
}
