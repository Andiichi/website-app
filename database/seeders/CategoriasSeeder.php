<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
        //informando quantas categorias fakes(do factory) irá gerar
        Categoria::factory()->count(10)->create();
    }
}
