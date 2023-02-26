<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    protected $fillable = ['id_comuna','dir_calle','dir_depto','dir_depto','dir_numero'];
    use HasFactory;
}
