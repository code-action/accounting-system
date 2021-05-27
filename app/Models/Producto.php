<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $fillable = [
        'prod_nombre',
        'prod_cantidad',
        'prod_precio',
        'categoria_id',
    ];

    public function materiales()
    {
        return $this->hasMany('App\Models\MaterialProducto');
    }


    // Relación muchos a muchos
    public function cotizaciones()
    {
        return $this->belongsToMany(Cotizacion::class)->withPivot('cot_prod_cantidad', 'cot_prod_preciou');
    }
}
