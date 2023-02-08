<?php

namespace Database\Seeders;

use App\Models\Employer;
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
//        EmployerTableSeeder::factory(30)->create();
        $this->call(EmployersPositionsTableSeeder::class);
        $this->call(EmployersPermissionsTableSeeder::class);
        $this->call(EmployerTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //если хочу создать тест данные - фабрикой ) заранее ее определяю в database/factories
        //с начала категории потом посты ) так как посты используют категории
    }
}
