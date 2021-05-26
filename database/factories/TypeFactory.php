<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name' =>$this->faker->text(20),
        'slug' =>$this->faker->slug(),
        'order' =>$this->faker->numberBetween(1, 10),
        'status' =>$this->faker->boolean(),
        'category_id' =>$this->faker->numberBetween(1, 10),
        ];
    }
}
