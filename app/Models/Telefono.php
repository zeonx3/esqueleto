<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = [

        'tel_tipo', 'te_numero'

    ];
    use HasFactory;

}
