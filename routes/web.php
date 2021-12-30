<?php

use App\Http\Controllers\CovidController;
use App\Http\Controllers\HandleDataController;
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
    return view('welcome');
});

Route::get('/cases', [HandleDataController::class, 'saveCasesCovid']);
Route::get('/location', [HandleDataController::class, 'saveLocationCovid']);
Route::get('/test', [CovidController::class, 'test']);
