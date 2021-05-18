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
        'mat_cantidad'
    ];

    public function proveedores()
    {
        // return $this->hasMany('App\MaterialProvider');
    }
}
