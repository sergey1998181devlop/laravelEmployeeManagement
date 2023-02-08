<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployersPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'SuperAdministrator',
            ],
            [
                'name' => 'Administrator',
            ],
            [
                'name' => 'Editor',
            ],
            [
                'name' => 'Author',
            ],
            [
                'name' => 'Participant',
            ],
        ];
        \DB::table('employers_permissions')->insert($data);
    }
}
