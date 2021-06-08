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

    public function cantidad($producto_id,$material_id){
        $material=MaterialProducto::where('material_id',$material_id)->where('producto_id',$producto_id)->get()->first();
        if(is_null($material))
            return "";
        else
            return $material->mat_prod_cantidad;
    }
}