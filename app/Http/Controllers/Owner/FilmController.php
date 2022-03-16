<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\FilmStoreRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Owner;
use App\Models\Film;
use App\Models\Director;
use InterventionImage;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\ImageResizeService;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    // public function __construct()
    //  {
    //     $this -> middleware('auth:owners');


    //     $this->middleware(function($request,$next){
    //         $id = $request->route()->parameter('film');
    //         if(!is_null($id)){
    //            $OwnerId = Owner::findOrFail($id)->owner->id;

    //            $Id = (int)$OwnerId;

    //            $ownerId = Auth::id();

    //            if($Id !== $ownerId){
    //                abort(404);
    //            }
    //         }

    //         return $next($request);
    //     });

    //  }
    public function index(Film $film)
    {

        $films = $film->paginate(4);
        // dd($films);



        // モデル側でページネーションしたデータを持ってくる。
          // var_dump($film);
        // $films = $film->pagination();

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
    public function store(FilmStoreRequest $request)
    {
        //FilmStoreRequest

        // dd($request->category);
        $image = $request->movie_image;

        //サービスで切り離したupload関数を使って画像のリサイズを行っている。
        $image = $request->movie_image;
        if(!is_null($image) && $image->isValid()){

           $filmToData = ImageResizeService::upload($image,'images');
        }


        // echo $faileNameTofilm;

        //リレーション（director,filmのテーブル）に同時に保存するためにトランザクション処理を行う。

        // dd($request);
        try{
            DB::transaction(function () use($request,$filmToData) {
                $director_Data=Director::create([
                    'director_name' => $request->director_name,
                    'director_age' => (int)$request->director_age,
                    'director_gender' => (int)$request->director_gender,

            ]);
                Film::create([
                'name' => $request->name,
                'director_id' => (int)$director_Data->id,
                'movie_image' =>$filmToData,
                'movie_time' => (int)$request->movie_time,
                'category' => $request->category,
                'information' => $request->information,
            ]);

                //   $film->save();
        },2);
        }catch(Throwabler $e){
            Log::error($e);
            throw $e;
        };
        return redirect()
        ->route('owner.films.index');
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
        // $idと一致するデータを編集画面に表示するようにする。
        $filmData=Film::findOrFail($id);


        return view('owner.films.edit',compact('filmData'));
        // 画像のold作る、path()とか使うみたい。
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmStoreRequest $request, $id)
    {
        // 編集画面のformから受け取ったデータを上書きしDBに保存する。
        $filmToData = Film::findOrFail($id);
        // dd($request->information);

        //サービスで切り離したupload関数を使って画像のリサイズを行っている。
        $image = $request->movie_image;
        if(!is_null($image) && $image->isValid()){

           $filmToImage = ImageResizeService::upload($image,'images');
        }

        $filmToData->name = $request -> name;
        $filmToData->movie_image = $filmToImage;
        $filmToData->movie_time = $request -> movie_time;
        $filmToData->category = $request -> category;
        $filmToData->information = $request -> information;

        $filmToData -> save();

        return redirect()
        ->route('owner.films.index',with(['message' => '編集しました。']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Film::findOrFail($id)->delete();
         return redirect()
        ->route('owner.films.index')
         ->with(['message' => 'オーナー情報を削除しました。'
        ]);
    }


}
