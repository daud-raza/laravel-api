<?php

namespace Database\Factories\Model;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => $this->faker->word(),
            'detail'   => $this->faker->paragraph(),
            'price'    => $this->faker->numberBetween(100, 1000),
            'stock'    => $this->faker->randomDigit,
            'discount' => $this->faker->numberBetween(2, 30),
        ];
    }
}
