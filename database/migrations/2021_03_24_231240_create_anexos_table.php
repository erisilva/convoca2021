<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id();
            $table->string('arquivoNome'); // nome do arquivo
            $table->string('arquivoLocal'); // pasta onde será salvo o arquivo
            $table->text('arquivoUrl'); // url completa do arquivo
            $table->bigInteger('curriculo_id')->unsigned();
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
        Schema::table('anexos', function (Blueprint $table) {
            $table->dropForeign('anexos_curriculo_id_foreign');
        });

        Schema::dropIfExists('anexos');
    }
}
