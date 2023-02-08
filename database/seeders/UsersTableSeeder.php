<?php

namespace Database\Seeders;

//use DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //test data
            //bcrypt - hash password
            [
                'name' => 'admin',
                'email' => 'testAdmin@mail.ru',
                'password' => bcrypt('123123')
            ],
        ];
        \DB::table('users')->insert($data);
    }
}
