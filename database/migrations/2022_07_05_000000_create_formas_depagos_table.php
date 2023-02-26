<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormasDePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formasdepagos', function (Blueprint $table) {
            $table->id();
            $table->string('formp_nombre');
            $table->string('formp_comision');
            $table->integer('formp_online');
            $table->integer('formp_estado')->default(1)->nullable();
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
        Schema::dropIfExists('formasdepagos');
    }
}
