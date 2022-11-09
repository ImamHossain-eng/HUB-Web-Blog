<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


 


Auth::routes();


Route::prefix('home')->middleware('user')->group(function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    // Route::view('/posts/create', 'post.create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');

    
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin')->middleware('admin');
