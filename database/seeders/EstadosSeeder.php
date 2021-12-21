<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("estados")->insert([
            [
                "id"=> 1,
                "estado"=> "reservado",
            ],
            [
                "id"=> 2,
                "estado"=> "finalizado",
            ],
            [
                "id"=> 3,
                "estado"=> "cancelado",
            ],
        ]);
    }
}
