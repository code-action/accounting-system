<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cli_nombre', 'cli_email','cli_contacto', 'cli_telefono'];

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
}
