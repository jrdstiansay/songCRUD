<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

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
    return view("index");
});

Route::get('/api/song', [SongController::class, 'index'])->name('song-list');
Route::post('/api/song', [SongController::class, 'store'])->name('store');
Route::get('/api/song/{id}', [SongController::class, 'show']);
Route::put('/api/song/{id}', [SongController::class, 'update']);
Route::delete('/api/song/{id}', [SongController::class, 'delete']);