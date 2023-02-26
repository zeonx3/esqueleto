<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    
    static $rules = [
		'pro_nombre' => 'required',
		'pro_descripcion' => 'required',
		'pro_imagen' => 'required',
		'id_categoria' => 'required',
    ];

    protected $fillable = [

      'pro_nombre',
      'pro_tipo',
      'pro_descripcion',
      'pro_neto',
      'pro_bruto',
      'pro_exento',
      'pro_pesable',
      'pro_uni_medida',
      'pro_sku',
      'pro_int_esp',
      'pro_imagen',
      'pro_codbarra',
      'pro_costo',
      'id_categoria',
      'id_empresa',
      'pro_estado'

    ];





}
