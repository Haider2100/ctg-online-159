<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('LoginB');



Route::get('/home', [UserController::class,'login'])->name('home');

//Route::redirect('/redirect','/dashboard');

Route::post('/login', [UserController::class,'login'])->name('login');

Route::get('/register', [UserController::class,'showregister'])->name('register.show');
Route::post('/register', [UserController::class,'register'])->name('register');
Route::get('/profile', [UserController::class,'profile'])->name('profile');


