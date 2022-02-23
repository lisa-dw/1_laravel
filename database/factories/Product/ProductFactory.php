<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productName'=>$this->faker->colorName(),
            'price'=>$this->faker->numberBetween(1000, 10000),
            'stock'=>$this->faker->numberBetween(0, 100),
            'title'=>$this->faker->company(),
            'contents'=>$this->faker->text(),
            'productImage'=>$this->faker->imageUrl(),
            'grade'=>$this->faker->city(),
        ];
    }
}
