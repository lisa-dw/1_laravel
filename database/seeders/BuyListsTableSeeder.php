<?php

namespace Database\Seeders;

use App\Models\Product\BuyList;
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
        BuyList::factory(10)->create();
    }
}
