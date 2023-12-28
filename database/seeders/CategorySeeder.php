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
            'name' => 'Default',
            'description' => 'Categoría por defecto',
        ]);
        Category::create([
            'name' => 'Procesadores',
            'description' => 'Categoría de procesadores',
        ]);
        Category::create([
            'name' => 'Tarjetas de video',
            'description' => 'Categoría de tarjetas de video',
        ]);

    }
}
