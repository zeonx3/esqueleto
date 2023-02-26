<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventadetalles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_venta');
            $table->integer('id_producto');
            $table->string('ventd_cantidad');
            $table->string('ventd_comision');
            $table->integer('ventd_estado')->default(1)->nullable();
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
        Schema::dropIfExists('ventadetalles');
    }
}
