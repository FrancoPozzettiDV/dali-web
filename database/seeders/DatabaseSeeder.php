<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PerfilesSeeder::class,
            UsuariosSeeder::class,
            CentrosSeeder::class,
            CategoriasSeeder::class,
            PublicacionesSeeder::class,
            ComentariosSeeder::class,
            ActividadesSeeder::class,
			EstadosSeeder::class,
			TurnosSeeder::class,
        ]);
    }
}
