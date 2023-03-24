<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostImageSeeder::class);
        $this->call(ContactSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');


    }
}
