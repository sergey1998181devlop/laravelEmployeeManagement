<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployersPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateCreated = Carbon::now();
        $data = [
            [
                'name' => 'IT full-stack programmer',
                'created_at' => $dateCreated,
            ],
            [
                'name' => 'Moderator',
                'created_at' => $dateCreated,
            ],
            [
                'name' => 'Tester',
                'created_at' => $dateCreated,
            ],
            [
                'name' => 'Information security specialist',
                'created_at' => $dateCreated,
            ],
            [
                'name' => 'System analyst',
                'created_at' => $dateCreated,
            ],
            [
                'name' => 'Pimp',
                'created_at' => $dateCreated,
            ],
            [
                'name' => 'Team leader',
                'created_at' => $dateCreated,
            ],
        ];
        \DB::table('employers_positions')->insert($data);
    }
}
