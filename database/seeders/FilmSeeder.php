<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            ['name'=>'sample1',
            'movie_image'=>'sample1.jpg',
            'movie_time'=>121,
            'cetegory'=>1,
            'infomation'=>'test1test1test1test1test1test1test1test1test1test1test1test1test1test1test1',
            ],
            ['name'=>'sample2',
            'movie_image'=>'sample2.jpg',
            'movie_time'=>120,
            'cetegory'=>2,
            'infomation'=>'test2test2test2test2test2test2test2test2test2test2test2test2test2test2',
            ],
            ['name'=>'sample3',
            'movie_image'=>'sample3.jpg',
            'movie_time'=>129,
            'cetegory'=>3,
            'infomation'=>'test3',
            ],
            ['name'=>'sample4',
            'movie_image'=>'sample4.jpg',
            'movie_time'=>500,
            'cetegory'=>4,
            'infomation'=>'test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4test4',
            ],
            ['name'=>'sample5',
            'movie_image'=>'sample5.jpg',
            'movie_time'=>10,
            'cetegory'=>5,
            'infomation'=>'test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5test5',
            ],
            ['name'=>'sample6',
            'movie_image'=>'sample6.jpg',
            'movie_time'=>200,
            'cetegory'=>6,
            'infomation'=>'test6test6test6test6test6test6test6test6test6',
            ],
            ['name'=>'sample7',
            'movie_image'=>'sample7.jpg',
            'movie_time'=>20,
            'cetegory'=>7,
            'infomation'=>'test7test7test7test7test7test7test7test7test7test7test7test7test7test7',
            ],


        ],);
    }
}
