<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\StaticController;

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




Route::get('/', [IndexController::class, 'handle']);
Route::get('/category/{name}', [CategoryController::class, 'handle']);
Route::get('/single/{uuid}', [SingleController::class, 'handle']);
Route::get('/{param}', [StaticController::class, 'handle']);

Route::post('/search', [SearchController::class, 'handle']);
