<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Recipe::factory(10)
            ->has(\App\Models\Step::factory()->count(fake()->numberBetween(3, 10)), 'steps')
            ->has(\App\Models\Ingredient::factory()->count(fake()->numberBetween(3, 10)), 'ingredients')
            ->create();
    }
}
