<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculos', function (Blueprint $table) {
            $table->id();

            $table->string('entidade');

            $table->string('cnpj');



            // endereço
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('uf');

            
            $table->string('representante');

            $table->string('cpf');


            $table->string('email');
            $table->string('cel1'); // ogrigatorio
            $table->string('cel2')->nullable();



            // anexos
            $table->string('arquivo1Nome'); // nome do arquivo
            $table->string('arquivo1Local'); // pasta onde será salvo o arquivo
            $table->text('arquivo1Url'); // url completa do arquivo

            $table->string('arquivo2Nome')->nullable(); // nome do arquivo
            $table->string('arquivo2Local')->nullable(); // pasta onde será salvo o arquivo
            $table->text('arquivo2Url')->nullable(); // url completa do arquivo

            $table->string('arquivo3Nome')->nullable(); // nome do arquivo
            $table->string('arquivo3Local')->nullable(); // pasta onde será salvo o arquivo
            $table->text('arquivo3Url')->nullable(); // url completa do arquivo

            $table->string('arquivo4Nome')->nullable(); // nome do arquivo
            $table->string('arquivo4Local')->nullable(); // pasta onde será salvo o arquivo
            $table->text('arquivo4Url')->nullable(); // url completa do arquivo

            $table->string('arquivo5Nome')->nullable(); // nome do arquivo
            $table->string('arquivo5Local')->nullable(); // pasta onde será salvo o arquivo
            $table->text('arquivo5Url')->nullable(); // url completa do arquivo

            $table->string('arquivo6Nome')->nullable(); // nome do arquivo
            $table->string('arquivo6Local')->nullable(); // pasta onde será salvo o arquivo
            $table->text('arquivo6Url')->nullable(); // url completa do arquivo


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

        Schema::dropIfExists('curriculos');
    }
}
