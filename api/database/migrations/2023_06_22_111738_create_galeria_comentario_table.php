<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //[ 'FotosId', 'Descricao', 'UserId', 'Status' ];
        Schema::create('galeria_comentario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('GaleriaId');
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
        Schema::dropIfExists('galeria_comentario');
    }
}
