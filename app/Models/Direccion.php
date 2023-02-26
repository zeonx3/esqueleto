<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $fillable = ['id_comuna','dir_calle','dir_depto','dir_depto'];
  
}
