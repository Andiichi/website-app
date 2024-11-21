<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Categoria::class;

    public function definition() 
    {
        return [
            //criando os dados fakes com um array
            'nome' => $this->faker->unique()->word,
            'descricao' => $this->faker->text,
        ];
    }
}
