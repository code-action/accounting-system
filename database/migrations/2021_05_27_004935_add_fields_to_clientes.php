<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {

            $table->string('cli_dui')->nullable()->unique();
            $table->string('cli_nit')->unique();
            $table->string('cli_nrc')->unique();
            $table->string('cli_categoria');
            $table->string('cli_direccion');
            // 1 Gran contribuyente
            // 2 Mediano contribuyente
            // 3 Otros contribuyentes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('cli_dui');
            $table->dropColumn('cli_nit');
            $table->dropColumn('cli_nrc');
            $table->dropColumn('cli_categoria');
            $table->dropColumn('cli_direccion');
        });
    }
}
