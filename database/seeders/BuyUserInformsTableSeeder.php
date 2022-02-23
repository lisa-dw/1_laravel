<?php

namespace Database\Seeders;

use App\Models\Product\buyUserInform;
use Illuminate\Database\Seeder;

class BuyUserInformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        buyUserInform::factory(10)->create();
    }
}
