<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => 'INTEL CORE I5-12600KF',
            'brand' => 'Intel',
            'cost' => 150.65,
            'price' => 154.99,
            'stock' => 10,
            'category_id' => 2,
        ]);
        Item::create([
            'name' => 'AMD RYZEN 9 5900X',
            'brand' => 'AMD',
            'cost' => 270.63,
            'price' => 289.99,
            'stock' => 10,
            'category_id' => 2,
        ]);
        Item::create([
            'name' => 'INTEL CORE I7-12700KF',
            'brand' => 'Intel',
            'cost' => 150.50,
            'price' => 179.99,
            'stock' => 10,
            'category_id' => 2,
        ]);
        Item::create([
            'name' => 'NVIDIA GEFORCE RTX 4070 TI OC EDITION',
            'brand' => 'Nvidia',
            'cost' => 800.00,
            'price' => 899.99,
            'stock' => 10,
            'category_id' => 3,
        ]);
        Item::create([
            'name' => 'NVIDIA GEFORCE RTX 4070 OC EDITION',
            'brand' => 'Nvidia',
            'cost' => 700.00,
            'price' => 799.99,
            'stock' => 10,
            'category_id' => 3,
        ]);
        Item::create([
            'name' => 'NVIDIA GEFORCE RTX 4070',
            'brand' => 'Nvidia',
            'cost' => 600.00,
            'price' => 699.99,
            'stock' => 10,
            'category_id' => 3,
        ]);

    }
}
