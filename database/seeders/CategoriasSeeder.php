<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categorias")->insert([
            [
                "id"=> 1,
                "nombre"=> "General",
                "descripcion"=> "Discusión sobre temas generales",
            ],
            [
                "id"=> 2,
                "nombre"=> "Sugerencias",
                "descripcion"=> "Consejos para mejorar nuestro sistema y servicio",
            ],
        ]);
    }
}
