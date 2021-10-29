<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->date('dt_nascimento');
            $table->string('cpf', 15)->unique();
            $table->string('email', 100)->unique();
            $table->string('cidade', 100);
            $table->string('estado', 2);
            $table->string('pais', 50)->nullable();
            $table->string('telefone', 20);
            $table->string('whatsapp', 20)->nullable();
            $table->string('instagram', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
