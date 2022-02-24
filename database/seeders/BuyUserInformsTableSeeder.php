<?php

namespace Database\Seeders;

use App\Models\Product\BuyUserInform;
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
        BuyUserInform::factory(10)->create();
    }
}
