<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        for ($i = 1; $i <= 20; $i++) {
            $category = Category::inRandomOrder()->first();
            Post::create([
                'title' => 'Post ' . $i,
                'url_clean' => 'post_' . $i,
                'content' => 'Post ' . $i,
                'posted' => 'not',
                'category_id' => $category->id
            ]);
        }
    }
}
