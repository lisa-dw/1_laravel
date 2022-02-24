<?php

namespace Database\Factories\Product;

use App\Models\Product\BuyList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyUserInformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buy_list_id'=> BuyList::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'name'=>$this->faker->name(),
            'phone'=>$this->faker->phoneNumber(),
            'zip'=>$this->faker->postcode(),
            'address'=>$this->faker->address(),
            'subAdress'=>$this->faker->address(),
        ];
    }
}
