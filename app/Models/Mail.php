<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = [

        'mail_correo', 'mail_tipo'

    ];
    use HasFactory;

}
