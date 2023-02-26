<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{

    protected $fillable = ['cli_nombre','cli_nomfanta','cli_mail','cli_giro','cli_rut','cli_telefono','id_direccion','cli_estado','cli_tipo'];


}
