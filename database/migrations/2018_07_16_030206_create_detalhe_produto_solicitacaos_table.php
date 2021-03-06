<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalheProdutoSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe_produto_solicitacao', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_solicitacao');
            $table->unsignedInteger('id_produto');

            $table->foreign('id_solicitacao')
                  ->references('id')->on('solicitacao')
                  ->onDelete('cascade');

            $table->foreign('id_produto')
                  ->references('id')->on('produto')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('detalhe_produto_solicitacao');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
