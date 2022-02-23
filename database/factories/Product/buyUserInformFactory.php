<?php

namespace Database\Factories\Product;

use App\Models\Product\buyList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class buyUserInformFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buyList_id'=> buyList::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'name'=>$this->faker->name(),
            'phone'=>$this->faker->phoneNumber(),
            'zip'=>$this->faker->postcode(),
            'address'=>$this->faker->address(),
            'subAdress'=>$this->faker->address(),
        ];
    }
}
