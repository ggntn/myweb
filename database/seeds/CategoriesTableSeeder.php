<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'Action'],
            ['category_name' => 'Adventure'],
            ['category_name' => 'Sci-Fi'],
            ['category_name' => 'Horror'],
            ['category_name' => 'Comady'],
            ['category_name' => 'Romantic'],
            ['category_name' => 'Fantasy'],
        ]);
    }
}
