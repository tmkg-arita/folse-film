<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Director;


class Film extends Model
{


    use HasFactory;



    protected $fillable = [
        'Director_id',
        'name',
        'movie_image',
        'movie_time',
        'category',
        'information',

    ];
    public function Director(){
        return $this->belongsTo(Director::class);
    }

    public function pagination(){
        $filmData=$this -> paginate(4);
        return($filmData);
    }
}
