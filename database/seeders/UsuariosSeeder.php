<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
            "id" => 1,
            "nombre" => "Franco",
            "apellido" => "Pozzetti",
            "telefono" => null,
            "email" => "franco.pozzetti@davinci.edu.ar",
            "usuario" => "FrankP",
            "password" => Hash::make(env('ADMIN_PASS')),
            "id_perfil" => 1,
            ],
            [
            "id" => 2,
            "nombre" => "Escuela",
            "apellido" => "Davinci",
            "telefono" => null,
            "email" => "davinci@davinci.edu.ar",
            "usuario" => "davinci",
            "password" => Hash::make("123456789"),
            "id_perfil" => 2,
            ]
        ]);
    }
}
