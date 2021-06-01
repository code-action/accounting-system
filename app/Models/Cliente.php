<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cli_nombre', 'cli_email','cli_contacto', 'cli_telefono', 'cli_dui', 'cli_nit', 'cli_nrc',
        'cli_categoria', 'cli_direccion'];

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
}
