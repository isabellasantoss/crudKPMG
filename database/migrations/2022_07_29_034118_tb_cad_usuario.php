<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCadUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tb_cad_usuario', function (Blueprint $table) {
            $table->increments('cod_id');
            $table->string('cod_matricula', 6);
            $table->string('cod_cpf', 14);
            $table->string('des_email');
            $table->char('flg_ativo', 4);
            $table->timestamps();
            $table->softDeletes('deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cad_usuario');
    }
}
