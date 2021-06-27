<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'id' => 1,
            'name' => 'test',
            'user_image' => 'http://abehiroshi.la.coocan.jp/abe-top-20190328-2.jpg',
            'd_o_b' => '1964-06-22',
            'sex' => 0,
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
