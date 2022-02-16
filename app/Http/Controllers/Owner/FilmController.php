<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Owner;
use App\Models\Film;
use InterventionImage;




class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    public function __construct()
     {
        $this -> middleware('auth:owners');


        $this->middleware(function($request,$next){
            $id = $request->route()->parameter('film');
            if(!is_null($id)){
               $OwnerId = Owner::findOrFail($id)->owner->id;

               $Id = (int)$OwnerId;

               $ownerId = Auth::id();

               if($Id !== $ownerId){
                   abort(404);
               }
            }

            return $next($request);
        });

     }
    public function index()
    {
        $films=Film::all();
        // dd($films);
        return view('owner.films.index',compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('owner.films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'infomation' => 'required|string|min:10|max:1500',
            'movie_image' => 'required|file',
            'movie_time' => 'required|integer|',
            'category' => 'required',

        ]);

        $image = $request->movie_image;

        $resizeImage=InterventionImage::make($image)
        ->resize(1920,1080)->encode();

        $fileName = uniqid(rand().'_');
        $extension = $image->extension();
        $faileNameTofilm = $fileName.'.'.$extension;
        storage::put('public/image'.$faileNameTofilm,$resizeImage);

        Film::create(['name' => $request->name,
                      'movie_image' =>,
                      'name' => $request->name,
                      'name' => $request->name,
                      'name' => $request->name,


        ])



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
