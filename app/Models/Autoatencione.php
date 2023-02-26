<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Autoatencione extends Model
{

    protected $fillable = [
        'id_autoatencion',
        'aut_nombre',
        'aut_estado'
    ];

}
