<?php

namespace Database\Seeders;

//use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employers = [];
        for ($i = 0; $i <= 50; $i++){
            $permission =  rand(1 , 5);
            $positions =  rand(1 , 7);
            $randNum = rand(1 , 100);
            $employers[] = [
                'name' => 'testName'.$randNum,
                'surname'  => 'testSurName'.$randNum,
                'permission_id' =>  $permission,
                'position_id' =>  $positions,
                'created_at' =>  Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400)),
            ];
        }
        \DB::table('employers')->insert($employers);
    }
}
