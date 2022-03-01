<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    // prefixで付けた接頭辞.loginを変数に代入している。
    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * (認証されていないときにユーザーがリダイレクトされるパスを取得します。)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // jsonでなかったらリダイレクト
        if (! $request->expectsJson()) {
            if(Route::is('owner.*')){
                return route($this->owner_route);
            } else{
                return route($this->user_route);
            }
        }
    }
}
