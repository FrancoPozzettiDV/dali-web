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
            "nombre" => "Hospital Piñero",
            "direccion" => "Av. Varela 1301",
            "telefono" => "011 4630-7300",
            "web" => "https://www.buenosaires.gob.ar/hospitalpinero",
            "latitud" => "-34.644685314235915",
            "longitud" => "-58.45435919322896",
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
			[
            "id" => 5,
            "nombre" => "Hospital Durand",
            "direccion" => "Av. Díaz Vélez 5044",
            "telefono" => "011 4982-5555",
            "web" => "https://www.buenosaires.gob.ar/hospitaldurand",
            "latitud" => "-34.60976065552623",
            "longitud" => "-58.43775511349367",
            ],
			[
            "id" => 6,
            "nombre" => "Hospital Ramos Mejía",
            "direccion" => "Gral. Urquiza 609",
            "telefono" => "011 4931-1884",
            "web" => "https://www.hospitalramosmejia.com.ar/",
            "latitud" => "-34.61763608822179",
            "longitud" => "-58.41023278650633",
            ],
			[
            "id" => 7,
            "nombre" => "Hospital Roca",
            "direccion" => "Av. Segurola 1949",
            "telefono" => "011 4630-4700",
            "web" => "https://www.buenosaires.gob.ar/hospitalrocca",
            "latitud" => "-34.618001964986966",
            "longitud" => "-58.501320811645584",
            ],
        ]);
        
    }
}
