<?php

namespace Database\Seeders;

use App\Models\Meals;
use Illuminate\Database\Seeder;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meals::factory(100)->create();
    }
}
