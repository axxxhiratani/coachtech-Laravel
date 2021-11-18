<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rest;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rest::create([
            "message"=>"test1",
            "url"=>"test1@example.com"
        ]);

        Rest::create([
            "message"=>"test2",
            "url"=>"test1@example.com"
        ]);

        Rest::create([
            "message"=>"test3",
            "url"=>"test3@example.com"
        ]);
    }
}
