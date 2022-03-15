<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directors')->insert([
            [
            'director_name'=>'沼宮内友嗣',
            'director_age'=>58,
            'director_gender'=>0,
            ],
            [
            'director_name'=>'川名部理来',
            'director_age'=>40,
            'director_gender'=>0,
            ],
            [
            'director_name'=>'六尾噓次郎',
            'director_age'=>19,
            'director_gender'=>0,
            ],
            [
            'director_name'=>'桜田佳央理',
            'director_age'=>45,
            'director_gender'=>1,
            ],
        ]);}

}
