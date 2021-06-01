<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizacions', function (Blueprint $table) {
            $table->date('cot_fecha')->after('updated_at');
            $table->string('cot_codigo'); // codigo
            $table->string('cot_descripcion')->nullable();
            $table->double('cot_sumas', 8, 2); // sumas
            $table->double('cot_iva', 8, 2); // iva = sumas * 0.13
            $table->double('cot_subtotal', 8, 2); // subtotal = sumas + iva
            $table->double('cot_retencion', 8, 2); // retención = sumas * 0.01
            $table->double('cot_total', 8, 2); // total = subtotal - retención
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizacions', function (Blueprint $table) {
            $table->dropColumn('cot_fecha');
            $table->dropColumn('cot_total');
            $table->dropColumn('cot_descripcion');
        });
    }
}
