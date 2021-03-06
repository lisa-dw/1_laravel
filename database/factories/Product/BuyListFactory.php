<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyListFactory extends Factory
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
            'order_num'=>$this->faker->numberBetween(100000000,300000000),
            'count' => $this->faker->numberBetween(1,5),
            'price'=> $this->faker->numberBetween(1000, 100000),
            'orderStatus'=>1,
        ];
    }
}
