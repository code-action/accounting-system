<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['prov_nombre', 'prov_encargado','prov_email', 'prov_telefono','prov_estado'];
}