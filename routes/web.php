<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
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

Route::get('/',[PokemonController::class,'index']);
Route::get('/create-type',[TypeController::class,'create']);
Route::post('/add-type',[TypeController::class,'store']);
Route::get('/create-pokemon',[PokemonController::class,'create']);
Route::post('/add-pokemon',[PokemonController::class,'store']);
Route::get('/pokemon/{id}',[PokemonController::class,'show']);
