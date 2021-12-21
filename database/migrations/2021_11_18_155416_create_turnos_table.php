<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->unsignedBigInteger("id_usuario");
			$table->string("paciente",45);
			$table->date("fecha");
			$table->time("desde");
			$table->time("hasta");
			$table->string("motivo",100);
			$table->unsignedBigInteger("id_usuario_profesional");
			$table->unsignedSmallInteger("id_estado");
			$table->foreign("id_usuario")->references("id")->on("users")->onDelete("no action")->onUpdate("cascade");
			$table->foreign("id_usuario_profesional")->references("id")->on("users")->onDelete("no action")->onUpdate("cascade");
			$table->foreign("id_estado")->references("id")->on("estados")->onDelete("no action")->onUpdate("cascade");
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
        Schema::dropIfExists('turnos');
    }
}
