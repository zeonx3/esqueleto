<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

    protected $fillable = [

		'ven_nombre',
		'ven_email',
		'ven_telefono',
		'ven_tokenorden',
		'ven_estado',
		'ven_total',
		'ven_cantidad',
		'ven_urlpago',
		'id_empmetpago',
		'ven_numero',
		'ven_rut',
		'id_empresaplataforma',
		'id_formadepago',
		'id_tipodocumento'
	];


}
