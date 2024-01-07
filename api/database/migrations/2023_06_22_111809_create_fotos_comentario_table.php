<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_comentario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('FotosId');
            $table->text('Descricao')->nullable();
            $table->integer('UserId')->nullable();
            $table->boolean('Status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_comentario');
    }
}
