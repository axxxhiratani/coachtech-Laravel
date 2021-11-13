<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Todo;

class CreateDabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_create()
    {

        $this->assertTrue(true);

        // テーブルにデータが入るかテスト
        Todo::factory()->create([
            "content" => "akio"
        ]);

        $this->assertDatabaseHas("todos",[
            "content" => "akio"
        ]);

    }
}
