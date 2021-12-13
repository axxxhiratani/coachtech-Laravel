<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Post;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_post()
    {
        $item = Post::factory()->create();
        $response = $this->get("/api/v1/post");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "content" => $item->content,
        ]);

    }

    public function test_store_post()
    {
        $data =[
            "user_id" => 1,
            "content" => "hello world",
        ];
        $response = $this->post("/api/v1/post",$data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas("posts",$data);

    }


    public function test_show_post()
    {
        $item = Post::factory()->create();
        $response = $this->get("/api/v1/post/".$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "content" => $item->content,
        ]);
    }

    public function test_delete_post()
    {
        $item = Post::factory()->create();
        $response = $this->delete("/api/v1/post/".$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }


}
