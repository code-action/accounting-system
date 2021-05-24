<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProducto extends Model
{
    use HasFactory;

    protected $table = "materiales_productos";

    protected $fillable = [
        'material_id',
        'producto_id',
        'prod_precio',
        'categoria_id',
    ];

    public $timestamps = false;

    public function material() { return $this->hasOne('App\Material', 'id', 'material_id'); }
    public function producto() { return $this->hasOne('App\Producto', 'id', 'producto_id'); }

}
