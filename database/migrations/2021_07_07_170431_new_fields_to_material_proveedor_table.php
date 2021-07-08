<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewFieldsToMaterialProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_proveedor', function (Blueprint $table) {
            $table->string('mat_prov_lote')->nullable();
            $table->date('mat_prov_fecha_fabricacion')->nullable();
            $table->date('mat_prov_fecha_vencimiento')->nullable();
            $table->double('mat_prov_disponibles')->nullable();
            $table->unsignedBigInteger('orden_id')->nullable();
            $table->foreign('orden_id')->references('id')->on('orden_compras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_proveedor', function (Blueprint $table) {
            //
        });
    }
}
