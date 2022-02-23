<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class buyListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'count' => $this->faker->numberBetween(0, 5),
            'price'=> $this->faker->numberBetween(1000, 100000),
            'orderStatus'=> $this->faker->numberBetween(0, 2),

        ];
    }
}
