<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->insert([
            ['name'=>'Furniture'],
            ['name'=>'Electrical Appliances'],
            ['name'=>'Food']
        ]);
        // Category::factory()->count(10)->create();
    }
}
