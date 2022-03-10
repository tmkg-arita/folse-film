<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use InterventionImage;
use App\Services\ImageResizeService;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     * (登録ビューを表示します。)
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.auth.register');
    }

    /**
     * Handle an incoming registration request.
     * (着信登録要求を処理します。)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            // user_imageはnullを登録しデフォルトの画像を表示する。
            'user_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            //informationはnullを許容する。
            'information' => 'nullable|string|max:1500',
        ]);

        // ユーザーの画像をリサイズして登録。service->imageresizeserviceに登録しているアプリを使っている。
        $userImage = $request->user_image;

        // ユーザーの画像があれば登録、nullならデフォルトの画像を表示するようにしている。
        if(!is_null($userImage) && $userImage->isValid()){

            $userToImage = ImageResizeService::userImage_upload($userImage,'images');
         }else{
             $userToImage = null;
         }

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_image' => $userToImage,
            'information' => $request->information,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
     }
}
