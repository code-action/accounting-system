<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaOrden extends Model
{
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}