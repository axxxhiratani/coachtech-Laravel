<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param =[
            "name" => "tony",
            "age" => 23,
            "nationality" => "inokuchi"
        ];
        DB::table("authors")->insert($param);

        $param =[
            "name" => "banana",
            "age" => 23,
            "nationality" => "mukainada"
        ];
        DB::table("authors")->insert($param);

        $param =[
            "name" => "akio",
            "age" => 22,
            "nationality" => "inokuchi"
        ];
        DB::table("authors")->insert($param);

        $param =[
            "name" => "party",
            "age" => 22,
            "nationality" => "okayama"
        ];
        DB::table("authors")->insert($param);

    }
}
