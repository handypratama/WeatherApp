<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
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


Route::get('/',[APIController::class, 'index']);
Route::get('/weather',[APIController::class, 'WeatherApi']);

Route::get('/', [APIController::class, 'ip_details'])->name('ip_details');
