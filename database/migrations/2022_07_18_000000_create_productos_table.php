<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('pro_nombre');
            $table->integer('pro_tipo');
            $table->string('pro_descripcion');
            $table->integer('pro_neto')->nullable();
            $table->integer('pro_bruto')->nullable();
            $table->integer('pro_exento');
            $table->integer('pro_pesable');
            $table->integer('pro_uni_medida');
            $table->string('pro_sku')->nullable();
            $table->integer('pro_int_esp');
            $table->string('pro_imagen')->nullable();
            $table->string('pro_codbarra')->nullable();
            $table->string('pro_costo')->nullable();
            $table->integer('id_categoria');
            $table->integer('pro_estado')->default(1)->nullable();
            $table->string('pro_venta')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
