<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;

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
    return view('Home');
});

    // Your routes go here
    Route::get('/home', [HomeController::class, 'show'])->name('Home.page');

    Route::get('/trivia/page', [TriviaController::class, 'show'])->name('trivia.page');
    Route::get('/trivia/fetch', [TriviaController::class, 'fetchQuizdb'])->name('trivia.fetch');
    Route::get('/trivia/store', [TriviaController::class, 'store'])->name('trivia.store');
    Route::get('/trivia/add', [TriviaController::class, 'add'])->name('trivia.add');
    Route::post('/trivia/added', [TriviaController::class, 'added'])->name('trivia.added');
    // Route::post('/trivia/added', [TriviaController::class, 'added'])->name('trivia.added');

    Route::get('trivia/user/login',[UserController::class, 'show'])->name('user.login');
    Route::get('trivia/user/register',[UserController::class, 'showreg'])->name('user.register');
    Route::post('trivia/user/registering',[UserController::class, 'register'])->name('user.registering');
    Route::post('trivia/user/loging',[UserController::class, 'authenticate'])->name('user.loging');
    Route::get('trivia/user/logout',[UserController::class, 'logout'])->name('user.logout');


