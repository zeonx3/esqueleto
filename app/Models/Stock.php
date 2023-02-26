<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    
    protected $table = "stocks";

    protected $fillable = ['id_bodega','id_producto','sto_cantidad'];



}
