<?php

use Illuminate\Database\Seeder;

class MangasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mangas')->insert([
        ['category_id' => '1',
            'author_id' => '1',
            'chap_id' => '1',
            'manga_name' => 'a',
            'detail' => 'a',
            'image' => 'Sci-Fi'],
            ['category_id' => '2',
                'author_id' => '2',
                'chap_id' => '2',
                'manga_name' => 'b',
                'detail' => 'b',
                'image' => 'Sci-Fi'],
            ['category_id' => '3',
                'author_id' => '3',
                'chap_id' => '3',
                'manga_name' => 'c',
                'detail' => 'c',
                'image' => 'Sci-Fi'],



          ]);
    }
}
