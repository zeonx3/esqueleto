<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuariosempresa extends Model
{
    
    static $rules = [
		'id_usuario' => 'required',
		'id_empresa' => 'required',
    ];

    protected $perPage = 20;

    protected $table = 'usuarioempresas';

    protected $fillable = ['id_usuario','id_empresa','usm_estado'];



}
