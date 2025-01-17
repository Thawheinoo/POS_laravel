<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\socialLoginController;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/admin.php';
require_once __DIR__.'/user.php';


Route::get('/', function(){
    return view('authentication.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//google github login
Route::get('/auth/{provider}/redirect',[socialLoginController::class , 'redirect'])->name('redirect');

Route::get('/auth/{provider}/callback', [socialLoginController::class , 'callback'])->name('callback');



