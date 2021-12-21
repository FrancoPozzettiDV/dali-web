<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("perfiles")->insert([
            [
                "id"=> 1,
                "categoria"=> "admin",
            ],
            [
                "id"=> 2,
                "categoria"=> "usuario",
            ],
            [
                "id"=> 3,
                "categoria"=> "paciente",
            ],
            [
                "id"=> 4,
                "categoria"=> "profesional",
            ],
        ]);
    }
}
