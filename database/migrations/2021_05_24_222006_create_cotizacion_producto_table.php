<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_producto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('cotizacion_id')->constrained('cotizacions');
            $table->foreignId('producto_id')->constrained('productos');

            $table->integer('cot_prod_cantidad');
            $table->float('cot_prod_preciou', 8, 2); // El precio uni. de los productos cambia en el tiempo
            $table->float('cot_prod_total', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion_producto');
    }
}
