<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Comment;


class CommentFactory extends Factory
{
    /**
     * @var
     */
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "user_id" => $this->faker->numberBetween(1,20),
            "post_id" => $this->faker->numberBetween(1,20),
            "content" => $this->faker->text,
        ];
    }
}
