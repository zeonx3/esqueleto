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
            $table->string('pro_descripcion');
            $table->string('pro_neto')->nullable();
            $table->string('pro_sku')->nullable();
            $table->string('pro_imagen');
            $table->string('pro_codbarra')->nullable();
            $table->string('pro_costo')->nullable();
            $table->integer('id_categoria');
            $table->integer('id_bodega')->nullable();
            $table->integer('pro_estado')->default(1)->nullable();
            $table->string('pro_venta')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
