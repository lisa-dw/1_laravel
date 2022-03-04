<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_userId'=>User::inRandomOrder()->first()->userid,
            'product_id'=>Product::inRandomOrder()->first()->id,
            'count' => $this->faker->numberBetween(1,10),
        ];
    }
}
