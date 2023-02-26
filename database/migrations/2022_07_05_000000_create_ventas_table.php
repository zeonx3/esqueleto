<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('ven_total');
            $table->string('ven_neto');
            $table->string('ven_iva');
            $table->string('ven_comi_vendedor');
            $table->string('ven_comi_formpago');
            $table->integer('ven_tipodespacho');
            $table->integer('id_direccion');
            $table->integer('id_comprador');
            $table->integer('id_bodega');
            $table->integer('id_formpago');
            $table->string('ven_folio');
            $table->string('ven_transaccion');
            $table->integer('id_carrier');
            $table->string('ven_tipodocumento');
            $table->dateTime('ven_fecha')->nullable();
            $table->string('ven_estado')->default(1)->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
