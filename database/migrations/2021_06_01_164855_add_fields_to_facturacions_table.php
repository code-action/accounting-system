<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturacions', function (Blueprint $table) {

            $table->foreignId('cliente_id')->constrained()->after('fact_fecha');
            $table->string('fact_codigo')->after('updated_at');; // codigo
            $table->double('fact_sumas', 8, 2); // sumas
            $table->double('fact_iva', 8, 2); // iva = sumas * 0.13
            $table->double('fact_subtotal', 8, 2); // subtotal = sumas + iva
            $table->double('fact_retencion', 8, 2); // retención = sumas * 0.01
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturacions', function (Blueprint $table) {
            //$table->dropColumn('facturacions_cliente_id_foreign');
            $table->dropColumn('fact_codigo');
            $table->dropColumn('fact_sumas');
            $table->dropColumn('fact_iva');
            $table->dropColumn('fact_subtotal');
            $table->dropColumn('fact_retencion');

        });
    }
}
