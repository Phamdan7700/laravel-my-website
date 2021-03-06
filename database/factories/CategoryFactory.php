<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'slug' => $this->faker->slug(),
            'order' => $this->faker-> numberBetween(1, 10),
            'status' => $this->faker->boolean(),
            'created_by' =>$this->faker->numberBetween(1, 10),
            'updated_by' =>$this->faker->numberBetween(1, 10),
        ];
    }
}
