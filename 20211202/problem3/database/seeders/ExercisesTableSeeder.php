<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Exercise;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Exercise::create([
            "name"=>"akio",
            "email"=>"akio@gmail.com",
            "profile"=>"hello world"
        ]);
        Exercise::create([
            "name"=>"yuri",
            "email"=>"yuri@gmail.com",
            "profile"=>"hello kyoto"
        ]);
    }
}
