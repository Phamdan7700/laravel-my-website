<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->text(),
        'slug' => $this->faker->slug(),
        'summary' => $this->faker->text(),
        'thumbnail' => $this->faker->imageUrl(),
        'content' => $this->faker->text(),
        'view' => $this->faker->numberBetween(),
        'hightlight' => $this->faker->boolean(),
        'status' => $this->faker->boolean(),
        'type_id' => $this->faker->numberBetween(1, 10),
        'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
