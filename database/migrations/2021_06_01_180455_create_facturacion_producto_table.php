<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion_producto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('facturacion_id')->constrained('facturacions')
                ->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos');

            $table->integer('fact_prod_cantidad');
            $table->float('fact_prod_preciou', 8, 2); // El precio uni. de los productos cambia en el tiempo
            $table->float('fact_prod_total', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturacion_producto');
    }
}
