<?php

use Illuminate\Database\Seeder;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            ['chap_id' => '1',
            'chap_name' => 'a1',
            'image' => 'Sci-Fi'],
            ['chap_id' => '1',
                'chap_name' => 'a2',
                'image' => 'Sci-Fi'],
            ['chap_id' => '2',
                'chap_name' => 'b1',
                'image' => 'Sci-Fi'],
            ['chap_id' => '2',
                'chap_name' => 'b2',
                'image' => 'Sci-Fi'],
            ['chap_id' => '3',
                'chap_name' => 'c1',
                'image' => 'Sci-Fi'],
            ['chap_id' => '3',
                'chap_name' => 'c2',
                'image' => 'Sci-Fi'],
            ['chap_id' => '1',
                'chap_name' => 'a3',
                'image' => 'Sci-Fi'],
        ]);
    }
}
