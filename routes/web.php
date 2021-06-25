<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AccessController;

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
Route::get('/profile/{uid}', [MainController::class, 'profile'])->name('profile');
Route::get('/post/{id}', [PostController::class, 'postinfo'])->name('postinfo');



Route::group(['middleware'=>['AuthCheck']], function()
{
    Route::post('/profile/addpost', [PostController::class, 'addpost'])->name('addpost');
    Route::get('/profile/delpost/{id}', [PostController::class, 'delpost'])->name('delpost');
    Route::post('/post/addcomment/{pid}', [PostController::class, 'addcomment'])->name('addcomment');
    Route::post('/post/addreply/{cid}', [PostController::class, 'addreply'])->name('addreply');
    Route::get('/post/delcomment/{id}', [PostController::class, 'delcomment'])->name('delcomment');
    Route::get('/library', [BooksController::class, 'library'])->name('library');
    Route::post('/library/addbook', [BooksController::class, 'addbook'])->name('addbook');
    Route::get('/library/removebook/{id}', [BooksController::class, 'removebook'])->name('removebook');
    Route::get('/library/editbook/{id}', [BooksController::class, 'editbook'])->name('editbook');
    Route::post('/library/updatebook/{id}', [BooksController::class, 'updatebook'])->name('updatebook');
    Route::get('/library/read/{id}', [BooksController::class, 'read'])->name('read');
    Route::post('/library/giveaccess/{id}', [AccessController::class, 'giveaccess'])->name('giveaccess');
    Route::get('/library/removeaccess/{id}', [AccessController::class, 'removeaccess'])->name('removeaccess');
    // Route::get('/profile', [PostController::class, 'profile'])->name('loadposts');
    Route::get('/auth', [MainController::class, 'login'])->name('login');
    Route::get('/auth', [MainController::class, 'reg'])->name('reg');
});