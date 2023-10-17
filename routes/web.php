<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('isAlreadyLoggedIn');
Route::get('/register',[AuthController::class,'register'])->name('register')->middleware('isAlreadyLoggedIn');
Route::post('/register-user',[AuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[AuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard')->middleware('isLaggedIn');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');