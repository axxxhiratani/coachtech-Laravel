<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Rest;

class RestFactory extends Factory
{

    protected $model = Rest::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "message"=>Str::random(10),
            "url"=>$this->faker->url,
        ];
    }
}
