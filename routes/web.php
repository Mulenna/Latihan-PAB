<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\LaguController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\loginController;
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
    return view('login');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::resource('/akun', AkunController::class);
Route::resource('/lagu', LaguController::class);
Route::resource('/playlist', PlaylistController::class);
Route::resource('/favorite', FavoritController::class);
Route::resource('/login', loginController::class);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin', function () {
        return 'admin page';
    });
});