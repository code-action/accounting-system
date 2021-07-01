<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->foreignId('empaque_id')->constrained('empaques');
            $table->foreignId('medida_id')->constrained('medidas');
            $table->string('prod_procedimiento');
            $table->double('prod_contenido', 9, 2);
            $table->string('prod_codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('prod_procedimiento');
            $table->dropColumn('prod_contenido');
        });
    }
}
