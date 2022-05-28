<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('domicilio');
            $table->string('dni')->unique();
            $table->string('email');
            $table->integer('tel')->nullable();
            $table->date('fecha_nac')->nullable();
            $table->text('datos')->nullable();
            $table->string('foto')->nullable();
            $table->timestamp('fecha_baja')->nullable();
            $table->string('password');
            $table->string('tipo');
            $table->tinyint('activo');
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
        Schema::dropIfExists('users');
    }
};
