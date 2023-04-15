<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;

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

Route::get('/pokemon', [PokemonController::class, 'home'])->name('pokemon.home');
Route::get('/pokemon/{page}',[PokemonController::class, 'index'])->name('pokemon.index');