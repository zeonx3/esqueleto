<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = 'landings';  

    protected $fillable = [

        'id_producto',
        'id_plataformaempresa',
        'id_metododepagos',
        'lan_nombre',
        'lan_video',
        'lan_ficha',
        'lan_item1',
        'lan_item2',
        'lan_item3',
        'lan_item4',
        'lan_item5',
        'lan_texto1',
        'lan_texto2',
        'lan_video',
        'lan_titulo',
        'lan_facebook',
        'lan_fb_url',
        'lan_fb_titulo',
        'lan_fb_descripcion',
        'lan_fb_img'

    ];
}
