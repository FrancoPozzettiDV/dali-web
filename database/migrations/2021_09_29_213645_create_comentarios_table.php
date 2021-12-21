<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("mensaje",500);
            $table->dateTime("fecha_creacion")->useCurrent();
            $table->dateTime("fecha_edicion")->nullable()->default(null)->useCurrentOnUpdate();
            $table->unsignedBigInteger("id_publicacion");
            $table->unsignedBigInteger("id_usuario");
            $table->tinyInteger("bloqueado")->default(0);
            $table->foreign("id_publicacion")->references("id")->on("publicaciones")->onDelete("no action")->onUpdate("cascade");
            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("no action")->onUpdate("cascade");
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
        Schema::dropIfExists('comentarios');
    }
}
