<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpyController;
use App\Http\Controllers\AgencyController;
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
    return view('welcome');
});

Route::get('/spies', [SpyController::class, 'index'])->name('spies.index');
Route::get('/agencies', [AgencyController::class, 'index'])->name('agencies.index');
