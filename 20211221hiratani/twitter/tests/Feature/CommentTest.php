<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_comment()
    {
        $item = Comment::factory()->create();
        $response = $this->get('/api/v1/comment');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "post_id" => $item->post_id,
            "content" => $item->content,
        ]);
    }

    public function test_store_comment()
    {
        $data = [
            "user_id" => 1,
            "post_id" => 1,
            "content" => "test",

        ];
        $response = $this->post('/api/v1/comment',$data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas("comments",$data);
    }

    public function test_show_comment()
    {
        $item = Comment::factory()->create();
        $response = $this->get('/api/v1/comment/'.$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "post_id" => $item->post_id,
            "content" => $item->content,
        ]);
    }

    public function test_delete_comment()
    {
        $item = Comment::factory()->create();
        $response = $this->delete('/api/v1/comment/'.$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
