<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresentacionToMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materiales', function (Blueprint $table) {
            $table->string('mat_codigo')->unique()->nullable()->after('id');
            $table->unsignedBigInteger('empaque_id')->nullable()->after('mat_nombre');
            $table->double('mat_contenido')->nullable()->after('empaque_id');
            $table->unsignedBigInteger('medida_id')->nullable()->after('mat_contenido');
            $table->foreign('empaque_id')->references('id')->on('empaques');
            $table->foreign('medida_id')->references('id')->on('medidas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materiales', function (Blueprint $table) {
            $table->dropForeign(['empaque_id']);
            $table->dropForeign(['medida_id']);
            $table->dropColumn('mat_codigo');
            $table->dropColumn('empaque_id');
            $table->dropColumn('mat_contenido');
            $table->dropColumn('medida_id');
        });
    }
}
