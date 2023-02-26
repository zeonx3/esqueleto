<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacionesusuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('id_receptor');
            $table->integer('id_emisor');
            $table->string('calu_calificacion');
            $table->string('calu_comentarios');
            $table->integer('calu_estado')->default(1)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('calificacionesusuarios');
    }
}
