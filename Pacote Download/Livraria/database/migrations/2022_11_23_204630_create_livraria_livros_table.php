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
        Schema::create('livraria_livros', function (Blueprint $table) {
            $table->unsignedBigInteger('livros_id');
            $table->foreign('livros_id')->references('id')->on('livros');
            $table->unsignedBigInteger('livraria_id');
            $table->foreign('livraria_id')->references('id')->on('livrarias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livraria_livros');
    }
};
