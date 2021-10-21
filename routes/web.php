<?php

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

/* 
| Home|Search Page Route
*/
Route::get('/', function () {
    return view('home');
})->name('search');

/* 
| Movie Detail Page Route
*/
Route::view('/view-movie', 'movie', ['imdb' => 'tt0088763'])->name('movie');
// Route::get('/view-movie', function () {
//     return view('movie', []);
// });
