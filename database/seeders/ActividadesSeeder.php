<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("actividades")->insert([
            [
            "id" => 1,
            "nombre" => "Cuadernillo de las vocales",
            "formato" => "pdf",
            "plano_linguistico" => "Fonológico",
            "rango_edad" => "De 5 a 6 años",
            "id_perfil" => "2",
            "id_drive" => "1kvjTf2SwFTEk7KMiP-TcafxICzfFdjTy",
            ],
			[
            "id" => 2,
            "nombre" => "Cuadernillo del abecedario",
            "formato" => "pdf",
            "plano_linguistico" => "Fonológico",
            "rango_edad" => "De 5 a 6 años",
            "id_perfil" => "2",
            "id_drive" => "1S_rYGd6P-NKUVEmiS8zso2Ds6CGeyupB",
            ],
			[
            "id" => 3,
            "nombre" => "Fonema inicial",
            "formato" => "pdf",
            "plano_linguistico" => "Fonológico",
            "rango_edad" => "De 3 a 4 años",
            "id_perfil" => "2",
            "id_drive" => "1mXgEoQNJKp-jALn21xFCs6c-TlNPqZT7",
            ],
			[
            "id" => 4,
            "nombre" => "Jugando con los sonidos",
            "formato" => "pdf",
            "plano_linguistico" => "Fonológico",
            "rango_edad" => "De 5 a 6 años",
            "id_perfil" => "2",
            "id_drive" => "1-3Z0mARlKcTb0xRCSWuMC3xsmzIObV5s",
            ],
			[
            "id" => 5,
            "nombre" => "Categorías semánticas-el intruso",
            "formato" => "pdf",
            "plano_linguistico" => "Semántico",
            "rango_edad" => "De 3 a 4 años",
            "id_perfil" => "2",
            "id_drive" => "180dQ_ZXyGn_JocJwldGyC_9czAN1GJ-l",
            ],
			[
            "id" => 6,
            "nombre" => "Palabras y sus sílabas",
            "formato" => "pdf",
            "plano_linguistico" => "Semántico",
            "rango_edad" => "De 5 a 6 años",
            "id_perfil" => "2",
            "id_drive" => "1N-wgojw7vLUAuHa3iZbbhnThvUxa9DUr",
            ],
			[
            "id" => 7,
            "nombre" => "Pistas semánticas",
            "formato" => "pdf",
            "plano_linguistico" => "Semántico",
            "rango_edad" => "De 3 a 4 años",
            "id_perfil" => "2",
            "id_drive" => "1-Hvo1yLN8F2tj-zPxNPK2-kaW0Pky10C",
            ],
			[
            "id" => 8,
            "nombre" => "Vocabulario",
            "formato" => "pdf",
            "plano_linguistico" => "Semántico",
            "rango_edad" => "2 años",
            "id_perfil" => "2",
            "id_drive" => "1ShWlX1RV9Ol1DjD5kdkj6FYoroY8K9Mk",
            ],
			[
            "id" => 9,
            "nombre" => "Contame las diferencias",
            "formato" => "jpg",
            "plano_linguistico" => "Morfosintáctico",
            "rango_edad" => "De 3 a 4 años",
            "id_perfil" => "2",
            "id_drive" => "1a57hsPExBpvQZUDtLDAdp8jLywLNjuSG",
            ],
			[
            "id" => 10,
            "nombre" => "Decime una oración con la palabra",
            "formato" => "jpg",
            "plano_linguistico" => "Morfosintáctico",
            "rango_edad" => "2 años",
            "id_perfil" => "2",
            "id_drive" => "1k28GjlujJarUukH1ipD5RbFr5k7hNhZ-",
            ],
			[
            "id" => 11,
            "nombre" => "Ordená y contame",
            "formato" => "jpg",
            "plano_linguistico" => "Morfosintáctico",
            "rango_edad" => "2 años",
            "id_perfil" => "2",
            "id_drive" => "1YKGsRrk2SxNhv2vzlSHJbx2f9Pz2UazX",
            ],
			[
            "id" => 12,
            "nombre" => "Escuchá y señalá",
            "formato" => "jpg",
            "plano_linguistico" => "Pragmático",
            "rango_edad" => "2 años",
            "id_perfil" => "2",
            "id_drive" => "18TQheBTLjCHy7MsFXsyC4r9TPS3vlS0u",
            ],
			[
            "id" => 13,
            "nombre" => "Respondé",
            "formato" => "jpg",
            "plano_linguistico" => "Pragmático",
            "rango_edad" => "Mayor de 7 años",
            "id_perfil" => "2",
            "id_drive" => "1zwurdTQhjoU3INQwTJYn_G0c28JFlO06",
            ],
            
        ]);
    }
}
