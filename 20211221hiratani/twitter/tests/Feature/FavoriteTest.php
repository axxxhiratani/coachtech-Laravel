<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Favorite;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_favorite()
    {
        $item = Favorite::factory()->create();
        $response = $this->get('/api/v1/favorite');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "post_id" => $item->post_id,
        ]);
    }

    public function test_store_favorite()
    {
        $data = [
            "user_id" => 1,
            "post_id" => 2,
        ];
        $response = $this->post('/api/v1/favorite',$data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas("favorites",$data);
    }

    public function test_show_favorite()
    {
        $item = Favorite::factory()->create();
        $response = $this->get('/api/v1/favorite/'.$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "post_id" => $item->post_id,
        ]);
    }

    public function test_delete_favorite()
    {
        $item = Favorite::factory()->create();
        $response = $this->delete('/api/v1/favorite/'.$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }



}
