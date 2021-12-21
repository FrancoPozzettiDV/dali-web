<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table("centros")->insert([
            [
            "id" => 1,
            "nombre" => "Hospital Garrahan",
            "direccion" => "Pichincha 1890",
            "telefono" => "011 4122-6000",
            "web" => "https://www.garrahan.gov.ar/",
            "latitud" => "-34.630806725187554",
            "longitud" => "-58.39336395263672",
            ],
            [
            "id" => 2,
            "nombre" => "Hospital Italiano",
            "direccion" => "Tte. Gral. Juan Domingo Perón 4190",
            "telefono" => "011 4959-0200",
            "web" => "https://www.hospitalitaliano.org.ar",
            "latitud" => "-34.60619055987916",
            "longitud" => "-58.425936698913574",
            ],
            [
            "id" => 3,
            "nombre" => "Hospital Aleman",
            "direccion" => "Av. Pueyrredón 1640",
            "telefono" => "011 4827-7000",
            "web" => "https://www.hospitalaleman.org.ar",
            "latitud" => "-34.591746624687",
            "longitud" => "-58.40141627940185",
            ],
            [
            "id" => 4,
            "nombre" => "Hospital Britanico",
            "direccion" => "Perdriel 74",
            "telefono" => "011 4309-6400",
            "web" => "https://www.hospitalbritanico.org.ar/",
            "latitud" => "-34.634267236133255",
            "longitud" => "-58.38778495788574",
            ],
        ]);
        
    }
}
