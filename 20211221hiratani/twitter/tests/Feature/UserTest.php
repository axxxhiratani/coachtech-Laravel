<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_user()
    {
        $data = [
            "uuid"=>"jfoefnir8i",
            "name"=>"test6"
        ];
        $response = $this->post('api/v1/user',$data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas("users",$data);
    }

    public function test_show_user()
    {
        $data = User::factory()->create();
        $response = $this->get('api/v1/user/'.$data->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "uuid" => $data->uuid,
            "name" => $data->name,

        ]);
    }

}
