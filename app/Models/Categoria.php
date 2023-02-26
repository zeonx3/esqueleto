<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{

    protected $fillable = [

        'cat_nombre','cat_padres','cat_imagen','cat_enable','id_empresa','cat_video'

    ];

}
