<?php

namespace Database\Seeders;

use App\Models\Product\buyList;
use Illuminate\Database\Seeder;

class BuyListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        buyList::factory(10)->create();
    }
}
