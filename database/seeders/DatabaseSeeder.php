<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * comando para executar o seed no bando de dados: php artisan db:seed <nomedoaquivo>Seeder
     */
    public function run()
    {   
       

        // $this->call(CategoriasSeeder::class); //pode está passando somente como argumento e nao array
    
        $this->call([ //passando a classe dos seeders que criamos por arrays
            UsersSeeder::class,
            CategoriasSeeder::class,
            ProdutosSeeder::class,
        ]);
    }
    
    // User::factory(10)->create();
}
