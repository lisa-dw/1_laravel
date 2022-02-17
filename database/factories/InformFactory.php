<?php

namespace Database\Factories;

use App\Models\Inform;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformFactory extends Factory
{
    protected $model = Inform::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title(),
            'content'=>$this->faker->text(),
            'user_userid'=> User::inRandomOrder()->first()->userid,
            'imgSrc'=>$this->faker->text()
        ];
    }
}
