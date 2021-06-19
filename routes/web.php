<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::post('/auth/save', [MainController::class, 'save'])->name('save');
Route::post('/auth/check', [MainController::class, 'check'])->name('check');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['AuthCheck']], function()
{
    Route::post('/profile/addpost', [PostController::class, 'addpost'])->name('addpost');
    Route::get('/profile/delpost/{id}', [PostController::class, 'delpost'])->name('delpost');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    // Route::get('/profile', [PostController::class, 'profile'])->name('loadposts');
    Route::get('/auth', [MainController::class, 'login'])->name('login');
    Route::get('/auth', [MainController::class, 'reg'])->name('reg');
});