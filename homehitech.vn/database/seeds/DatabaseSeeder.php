<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'admin@homehitech.vn',
            'password' => bcrypt('123456'),
            // 'created_at' => date('d-m-Y H:i:s')
        ]);
        // DB::table('contact')->insert([
        //     'address' => '83 ĐIỆN BIÊN PHỦ, ĐÀ NẴNG',
        //     'email' => 'admin@homehitech.vn',
        //     'phone_canhan' => '0932346868',
        //     'phone_congty' => '0932346868',
        //     'skype' => 'homehitech',
        //     'facebook' => 'http://facebook.com/homehitech.vn',
        // ]);
    }
}
