<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkychatController;
use App\Livewire\SkychatForum;
use App\Events\Skychat;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('home');
    
    Route::get('/explore', function () {
        return view('post.explore');
    })->name('explore-post');
    
    Route::get('/explore/friends', function () {
        return view('users.explore');
    })->name('explore-friends');

    Route::get('/post/{post}', [PostController::class, 'single'])->name('post');

    Route::get('/comment', function(){
        return view('other.comment');
    })->name('comment');
    
    Route::get('/user/{user:username}', [UserController::class, 'single'])->name('show-user');
    
    Route::get('/createpost', function () {
        return view('addPost');
    })->name('createpost');

    Route::get('/profile', [PostController::class, 'postProfil'])->name('profile');
    
    Route::get('/search', [PostController::class, 'search'])->name('searching');
    
    Route::get('/notification', function(){
        return view('notification');
    })->name('notifications');
    
    /*Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');*/
    
    // Route::get('/skychat/{user:username}', [SkychatController::class, 'message'])->name('messages');

  });
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->middleware('admin');
