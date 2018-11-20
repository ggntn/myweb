<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            ['author_name' => 'Toriyama'],
            ['author_name' => 'Akira'],
            ['author_name' => 'JK Rowling'],
            ['author_name' => 'Akiyama'],
            ['author_name' => 'Tsunade'],
            ['author_name' => 'Sasuke'],
            ['author_name' => 'Naruto'],
            ['author_name' => 'Buroto'],
        ]);
    }
}
