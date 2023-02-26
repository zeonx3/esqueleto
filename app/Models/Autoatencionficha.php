<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Autoatencionficha extends Model
{

    protected $fillable = [

        'id_producto',
        'aut_nombre',
        'aut_pie',
        'aut_video',
        'aut_img1',
        'aut_img2',
        'aut_img3',
        'aut_img4',
        'aut_img5',
        'aut_qr',
        'aut_estado'
    ];

}
