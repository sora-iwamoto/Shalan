<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FollowController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home_index');
    Route::delete('/home/{home}', [HomeController::class, 'delete'])->name('home_delete');
    Route::post('/posts', [PostController::class, 'store'])->name('post_store');
    Route::get('/message', [MessageController::class, 'index'])->name('message_index');
    Route::post('/messages', [MessageController::class, 'store'])->name('message_store');
    Route::get('/search/user/', [SearchController::class, 'index'])->name('search_index');
    Route::post('/follow/{userId}', [FollowController::class, 'follow']);
    Route::post('/unfollow/{userId}', [ FollowController::class, 'unfollow']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
