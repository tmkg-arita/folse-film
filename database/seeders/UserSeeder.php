<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('users')->insert([
            ['name'=>'userA',
            'email'=>'userA@user.com',
            'password'=> Hash::make('aaaaaaaaaa'),
            'user_image'=>'image_sample1',
            'information'=>'test1test1test1test1test1test1test1',
            ],]);
    }
}
