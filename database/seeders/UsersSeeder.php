<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Para inserção em massa em uma tabela, nos campos permitidos lá na Model, nesse caso é o de 'User'
     * comando para criar um novo Seeder: php artisan make:seeder <nome>Seeder
     */
    public function run(): void
    {
        //fazendo a inserção de linhas na tabela
        User::create([
            'firstname' => 'Andrezza',
            'lastname' => 'Nogueira',
            'email' => 'teste@email.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'firstname' => 'Rodrigo',
            'lastname' => 'Nogueira',
            'email' => 'teste@email.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}
