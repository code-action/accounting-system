<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    public function materiaOrden()
    {
        return $this->hasMany(MateriaOrden::class,'orden_id');
    }
}