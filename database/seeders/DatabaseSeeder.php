<?php

namespace Database\Seeders;

use App\Models\Inform;
use App\Models\Product\buyList;
use App\Models\Product\buyUserInform;
use App\Models\Product\cart;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

//        buyUserInform::truncate();
//        buyList::truncate();
//        cart::factory();
//        Product::truncate();
//
//        Inform::truncate();
//        User::truncate();

         \App\Models\User::factory(10)->create();

         $this->call(InformsTableSeeder::class);

         $this->call(ProductsTableSeeder::class);

//         $this->call(CartsTableSeeder::class);
//         $this->call(BuyListsTableSeeder::class);
//         $this->call(BuyUserInformsTableSeeder::class);

        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
