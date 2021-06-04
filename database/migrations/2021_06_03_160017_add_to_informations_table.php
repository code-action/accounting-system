<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informacions', function (Blueprint $table) {
            $table->string('info_fax')->nullable()->after('info_telefono');
            $table->string('info_correo')->nullable()->after('info_fax');
            $table->string('info_nit')->nullable()->unique()->after('info_correo');
            $table->string('info_nrc')->nullable()->unique()->after('info_nit');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informacions', function (Blueprint $table) {
            $table->dropColumn('info_fax');
            $table->dropColumn('info_correo');
            $table->dropColumn('info_nit');
            $table->dropColumn('info_nrc');
        });
    }
}