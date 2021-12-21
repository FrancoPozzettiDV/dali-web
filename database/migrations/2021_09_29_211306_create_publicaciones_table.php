<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("nombre",100);
            $table->string("descripcion",500);
            $table->dateTime("fecha")->useCurrent();
            $table->unsignedSmallInteger("id_categoria");
            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_categoria")->references("id")->on("categorias")->onDelete("no action")->onUpdate("cascade");
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
        Schema::dropIfExists('publicaciones');
    }
}
