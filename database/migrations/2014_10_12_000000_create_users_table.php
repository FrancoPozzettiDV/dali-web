<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('telefono',40)->nullable()->default(null);
            $table->string('email',60)->unique();
            $table->string('usuario',40);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',200);
            $table->unsignedSmallInteger("id_perfil")->default(2);
            $table->foreign("id_perfil")->references("id")->on("perfiles")->onDelete("no action")->onUpdate("cascade");
            $table->string('id_externo',100)->nullable();
            $table->string('auth_externo',30)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
