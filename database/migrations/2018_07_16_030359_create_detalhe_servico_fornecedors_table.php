<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalheServicoFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe_servico_fornecedor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_servico');
            $table->unsignedInteger('id_fornecedor');
            

            $table->foreign('id_servico')
                  ->references('id')->on('servico')
                  ->onDelete('cascade');

            $table->foreign('id_fornecedor')
                  ->references('id')->on('fornecedor')
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
        Schema::dropIfExists('detalhe_servico_fornecedors');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
