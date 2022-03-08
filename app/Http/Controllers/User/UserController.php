<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use InterventionImage;
use App\Services\ImageResizeService;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user,$id)
    {
        $users = $user -> user_index($id);

        return view('user.users.index',compact('users'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $userData=User::findOrFail($id);


        return view('user.users.edit',compact('userData'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
         // 編集画面のformから受け取ったデータを上書きしDBに保存する。
         $userToData = User::findOrFail($id);
         // dd($request->information);

         //サービスで切り離したupload関数を使って画像のリサイズを行っている。
         $image = $request->user_image;
         if(!is_null($image) && $image->isValid()){

            $userToImage = ImageResizeService::upload($image,'images');
         }

         $userToData->name = $request -> name;
         $userToData->movie_image = $userToImage;
         $userToData->email = $request -> email;
         $userToData->information = $request -> information;

         $userToData -> save();

         return redirect()
         ->route('dashboard',with(['message' => '編集しました。']));
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
