<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    protected $fillable = ['info_nombre','info_direccion','info_telefono','info_fax','info_correo','info_nit','info_nrc'];
}