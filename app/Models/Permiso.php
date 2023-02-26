<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 *
 * @property $id
 * @property $per_nombre
 * @property $per_accion
 * @property $per_estado
 * @property $id_modulo
 * @property $per_padre
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permiso extends Model
{
    
    static $rules = [
		'per_nombre' => 'required',
		'per_accion' => 'required',
		'id_modulo' => 'required',
		'per_padre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['per_nombre','per_accion','per_estado','id_modulo','per_padre'];



}
