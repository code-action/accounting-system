<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_proveedor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('material_id')->constrained('materiales');
            $table->foreignId('proveedor_id')->constrained('proveedors');
            $table->float('mat_prov_preciou', 8, 2);
            $table->bigInteger('mat_prov_cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_proveedor');
    }
}
