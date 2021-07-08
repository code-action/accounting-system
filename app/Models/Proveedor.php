<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['prov_nombre', 'prov_encargado','prov_email', 'prov_telefono','prov_estado'];

    public function materiales()
    {
        // return $this->hasMany('App\MaterialProvider');
        return $this->belongsToMany(Material::class)
            ->withPivot('id', 'mat_prov_preciou', 'mat_prov_cantidad','mat_prov_disponibles','orden_id')->withTimestamps();
    }
}

