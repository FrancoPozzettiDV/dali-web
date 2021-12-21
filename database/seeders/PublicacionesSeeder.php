<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("publicaciones")->insert([
            [
            "nombre" => "DALI les da la bienvenida",
            "descripcion" => "El foro esta abierto para todos los usuarios registrados. 
			Sean libres de publicar sus dudas y sugerencias.
			Espero que este espacio pueda servir para ayudarnos y conocer nuevas cuestiones",
            "id_categoria" => 1,
            "id_usuario" => 1
            ]
        ]);
    }
}
