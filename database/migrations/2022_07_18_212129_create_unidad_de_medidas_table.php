<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create_UnidadDeMedidas_table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidaddemedidas', function (Blueprint $table)
        {
            $table->id();
            $table->string('unid_nombre');
            $table->string('unid_nombre_corto');
            $table->integer('unid_estado')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidaddemedidas');
        
    }
}
