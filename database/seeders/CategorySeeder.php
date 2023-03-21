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
        Category::truncate();
        for ($i = 1; $i <= 20; $i++) {
            Category::create([
                'title' => 'Category ' . $i,
                'url_clean' => 'category_' . $i
            ]);
        }
    }
}
