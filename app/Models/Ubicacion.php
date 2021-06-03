<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    const STATUS_ERASER     = 0;
    const STATUS_ACTIVE     = 1;
    const STATUS_FINISHED   = 2;
    const STATUS_CANCELED   = 3;

    /**
     * Return list of status codes and labels

     * @return array
     */
    public static function listStatus()
    {
        return [
            self::STATUS_ERASER     => 'Borrador',
            self::STATUS_ACTIVE     => 'Vigente',
            self::STATUS_FINISHED   => 'Finalizado',
            self::STATUS_CANCELED   => 'Cancelado',
        ];
    }

    /**
     * Returns label of actual status

     * @param string
     */
    public function statusLabel()
    {
        $list = self::listStatus();
        return isset($list[$this->ubi_estado]) ? $list[$this->ubi_estado] : $this->ubi_estado;
    }

    protected $table = "ubicaciones";

    protected $fillable = [
        'ubi_lat',
        'ubi_long',
        'ubi_estado',
    ];
}
