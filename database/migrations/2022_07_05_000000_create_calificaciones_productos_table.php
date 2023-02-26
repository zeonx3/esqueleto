<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacionesproductos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->integer('id_producto');
            $table->string('calp_calificacion');
            $table->string('calp_comentarios');
            $table->integer('calp_estado')->default(1)->nullable();
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
        Schema::dropIfExists('calificacionesproductos');
    }
}
