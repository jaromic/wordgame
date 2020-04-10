<?php

use App\Dice;
use App\Game;
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

Route::middleware('auth')->group(function() {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/games', function () {
        return view('games', ['games' => Game::all()]);
    })->name('games');

    Route::get('/game/{id}', function ($id) {
        return view('game', ['game' => Game::where(['id'=>$id])->firstOrFail()]);
    })->name('game');


    Route::get('/dice', function () {
        return view('dices', ['dices' => Dice::all()]);
    })->name('dices');

});

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/register', function() {
    return view('login');
})->name('register');

Route::get('/resetpassword', function() {
    return view('login');
})->name('resetpassword');

Route::post('/authenticate', 'AuthenticationController@login')->name('authenticate');
Route::get('/logout', 'AuthenticationController@logout')->name('logout');
