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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nacionalidad')->nullable();
            $table->string('idioma')->nullable();
            $table->decimal('coordenadax', 15, 12)->nullable();
            $table->decimal('coordenaday', 15, 12)->nullable();
            $table->longtext('sip')->nullable();
            $table->longtext('enfermedades')->nullable();
            $table->longtext('familiares')->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
