<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Film extends Model
{


    use HasFactory;



    protected $fillable = [
        'name',
        'movie_image',
        'movie_time',
        'category',
        'information',

    ];


    public function pagination(){
        return $this -> paginate(4);
        
    }
}
