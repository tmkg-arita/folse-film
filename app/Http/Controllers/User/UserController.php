<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use InterventionImage;
use App\Services\ImageResizeService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        $id=Auth::id();
        if(isset($id)){
        $userData=$user->userData($id);
        }else{
            abort(409);
        }


        return view('user.users.index',compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $userToData = User::findOrFail($id);



        $image = $request->user_image;

        // 画像はnullなら既存のDBからデータを取得。
        if($image == null){
            $userToImage = $userToData->user_image;
        // null以外は画像があるということなのでリサイズして変数に格納。
        }else{
            $userToImage = ImageResizeService::userImage_upload($image,'images');
        }
        // dd($userToImage);

        $userToData->name = $request -> name;
        $userToData->email = $request -> email;
        $userToData->user_image = $userToImage;
        $userToData->information = $request -> information;

        $userToData -> save();

        return redirect()
        ->route('user.users.index',with(['message' => '更新しました。']));
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
