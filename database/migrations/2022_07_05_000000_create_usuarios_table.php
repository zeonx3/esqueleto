<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usu_nombre');
            $table->string('usu_apellido');
            $table->integer('id_mail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usu_password');
            $table->integer('usu_estado')->default(1)->nullable();
            $table->string('id_direccion');
            $table->integer('id_telefono');
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
        Schema::dropIfExists('usuarios');
    }
}
