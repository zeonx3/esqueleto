<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Verificacione
 *
 * @property $id
 * @property $ver_imagen
 * @property $ver_estado
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Verificacione extends Model
{
    
    static $rules = [
		'ver_imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ver_imagen','ver_estado'];



}
