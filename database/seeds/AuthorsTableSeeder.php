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
            ['author_name' => 'aaaaa'],
            ['author_name' => 'bbbbb'],
            ['author_name' => 'ccccc'],
            ['author_name' => 'ddddd'],
        ]);
    }
}