<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//prefixの/はasで別名user.と付けている。
Route::get('/', function () {
    return view('user.welcome');
});
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');


// Route::resource('users',UserController::class)
// ->middleware('auth:users')
// ->except(['show']);



require __DIR__.'/auth.php';
