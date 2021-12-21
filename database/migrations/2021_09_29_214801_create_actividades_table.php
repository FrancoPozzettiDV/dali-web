<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("nombre",100);
            $table->string("formato",50);
            $table->string("plano_linguistico",50);
            $table->string("rango_edad",50);
            $table->unsignedSmallInteger("id_perfil");
            $table->string("id_drive",50);
            $table->foreign("id_perfil")->references("id")->on("perfiles")->onDelete("no action")->onUpdate("cascade");
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
        Schema::dropIfExists('actividades');
    }
}
