<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/HelloWorld', function(){
  return Inertia::render('Helloworld');
});

Route::get('/Bookmark',[App\Http\Controllers\BookmarkController::class,'index'])
->name('bookmark.index');

Route::resource('/user', 'App\Http\Controllers\UserController');

Route::resource('/blogs', BlogController::class)
                  ->names(['index' => 'blog.index',
                        'create' => 'blog.create',
                        'edit' => 'blog.edit',
                        'update' => 'blog.update',
                        'destroy' => 'blog.destroy',
                        'store' => 'blog.store'])
                ->middleware('auth');
