<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'emp_nombre',
        'emp_contacto',
        'emp_logo',
        'emp_padre',
        'emp_mail',
        'emp_giro',
        'emp_rut',
        'emp_telefono',
        'id_direccion',
        'emp_estado',
        'emp_tipo'
        ];
}
