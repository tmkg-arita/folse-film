<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'director_name',
        'director_age',
        'director_gender',

    ];

    public function film(){
        return $this->hasMany(Film::class);
    }

    public function directorName(){
        $directorNames=$this -> all();
        return($directorNames);
    }
}
