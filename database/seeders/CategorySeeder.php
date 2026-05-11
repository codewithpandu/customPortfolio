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
        Category::create([
            'name' => 'Komputer',
            'slug' => 'komputer',
        ]);

        Category::create([
            'name' => 'Smartphone',
            'slug' => 'smartphone',
        ]);

        Category::create([
            'name' => 'Tutorial',
            'slug' => 'Tutorial',
        ]);

        Category::create([
            'name' => 'Gadget',
            'slug' => 'gadget',
        ]);
    }
}
