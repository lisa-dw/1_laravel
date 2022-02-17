<?php

namespace Database\Seeders;

use App\Models\Inform;
use Illuminate\Database\Seeder;

class InformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inform::factory(10)->create();
    }
}
