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
            ['name'=>'Furniture', 'image_path' => 'default.jpg'],
            ['name'=>'Electrical Appliances', 'image_path' => 'default.jpg'],
            ['name'=>'Food', 'image_path' => 'default.jpg']
        ]);
    }
}
