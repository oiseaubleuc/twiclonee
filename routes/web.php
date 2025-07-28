<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
//


use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
});

Route::get('/users/{user}', [TweetController::class, 'userTweets'])->name('users.tweets');

Route::post('/tweets/{tweet}/like', [LikeController::class, 'store'])->name('tweets.like');
Route::delete('/tweets/{tweet}/like', [LikeController::class, 'destroy'])->name('tweets.unlike');

// Home (tweets index)
Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');

Route::get('/notifications', function () {
    return view('notifications');
})->middleware('auth')->name('notifications');

// Profielpagina
Route::get('/@{username}', [App\Http\Controllers\ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('profile');



Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

Route::get('/home', fn () => redirect()->route('tweets.index'))->name('home');


Route::get('/@{username}', [ProfileController::class, 'show'])->name('profile');


use App\Http\Controllers\FollowController;

Route::post('/follow/{user}', [FollowController::class, 'toggle'])->middleware('auth')->name('follow.toggle');


Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';
