<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Happy Life'],
            ['name' => 'Fashion Tips'],
            ['name' => 'Food'],
            ['name' => 'Adventure'],
            ['name' => 'Art'],
            ['name' => 'Acedamic'],
            ['name' => 'Career'],
            ['name' => 'Yummy Bites']
        ];
        Category::insert($data);
    }
}
