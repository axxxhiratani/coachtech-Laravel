<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "uuid" => "WTKo0W8HyEegYgkuIKhqp2aBZ7F3",
            "name" => "test1"
        ]);

    }
}
