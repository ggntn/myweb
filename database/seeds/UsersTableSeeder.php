<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
//            ['name' => 'admin',
//                'username' => 'admin',
//                'email' => 'admin@admin.com',
//                'password' => '123456',
//                'role_id'=> '1'],
//            ['name' => 'member',
//                'username' => 'member',
//                'email' => 'member@member.com',
//                'password' => '123456',
//                'role_id'=> '2'],
            ['name' => 'Sanji',
                'username' => 'sanji',
                'email' => 'Sanji@example.com',
                'password' => bcrypt('12345678'),
                'role_id' => '2',
                'remember_token' => str_random(10),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('12345678'),
                'role_id' => '1',
                'remember_token' => str_random(10),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

        ]);
    }
}
