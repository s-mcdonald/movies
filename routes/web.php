<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MovieController;
use App\Models\Movie;

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

// Home Page
Route::get('/', function () {
    return view('home');
});

Route::get('search', [SearchController::class,'index'])->name('search-get');
Route::post('search', [SearchController::class,'store'])->name('search');
Route::get('movie/{movie}', [MovieController::class,'index'])->name('movie');