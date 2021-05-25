<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_compras', function (Blueprint $table) {
            $table->double('ord_total')->default(0)->after('proveedor_id');
            $table->boolean('ord_iva_incluido')->default(1)->after('ord_total');
            $table->double('ord_descuento')->default(0)->after('ord_iva_incluido');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_compras', function (Blueprint $table) {
            $table->dropColumn('ord_total');
            $table->dropColumn('ord_iva_incluido');
            $table->dropColumn('ord_descuento');
        });
    }
}