<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment::create([
            "user_id" => 1,
            "post_id" => 1,
            "content" => "hello"
        ]);
    }
}
