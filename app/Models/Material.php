<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = "materiales";

    protected $fillable = [
        'mat_nombre',
    ];

    public function proveedores()
    {
        // return $this->hasMany('App\MaterialProvider');
        return $this->belongsToMany(Proveedor::class)
            ->withPivot('id', 'mat_prov_preciou', 'mat_prov_cantidad')->withTimestamps();
    }
}
