<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\testController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
Route::resource('posts', PostController::class)->middleware('check_user');
Route::get('posts/restore/{id}', [PostController::class,'restore'])->name('post.restore');
Route::get('posts/forcedelete/{id}', [PostController::class,'forcedelete'])->name('post.forcedelete');
Route::get('posts/showNotification/{id}', [PostController::class,'showNotification'])->name('post.showNotification');
Route::get('notification/markAsRead', [PostController::class,'markAsRead'])->name('notification.markAsRead');
Route::get('users',[UserController::class,'index']);
Route::get('sendmail',[UserController::class,'sendMail']);
Route::get('showpost',[PostController::class,'showpost']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
