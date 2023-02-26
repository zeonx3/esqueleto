<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bodega
 *
 * @property $id
 * @property $bod_nombre
 * @property $bod_estado
 * @property $bod_retiro
 * @property $id_empresa
 * @property $id_direccion
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bodega extends Model
{
  

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bod_estado',
        'bod_retiro',
        'id_empresa',
        'bod_responsable',
        'bod_codigo',
        'bod_descripcion'

    ];



}
