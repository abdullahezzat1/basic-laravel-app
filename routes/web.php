<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountPagesController;
use App\Http\Controllers\AccountFormsController;
use App\Http\Controllers\NavigationController;

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



/*                  *********  Important Note **********

Routes are divided into groups or entities like Account, Navigation...etc.

If you can't find a specific route, that means it's being handled by the generic
navigation route "the last one on the page" simply because there's no logic behind it.

*/



/* Account Routes */
//pages
Route::get('/account/send/verification-email', [AccountPagesController::class, 'sendVerificationEmail']);
Route::get('/account/verify/email/{token}', [AccountPagesController::class, 'verifyEmail']);
Route::get('/account/send/password-reset', [AccountPagesController::class, 'sendPasswordReset']);
Route::get('/account/reset-password/{token}', [AccountPagesController::class, 'resetPassword']);
Route::get('/account/logout', [AccountPagesController::class, 'logout']);
//forms
Route::post('/account/forms/login', [AccountFormsController::class, 'login']);
Route::post('/account/forms/register', [AccountFormsController::class, 'register']);
Route::post('/account/forms/forgot-password', [AccountFormsController::class, 'forgotPassword']);
Route::post('/account/forms/reset-password', [AccountFormsController::class, 'resetPassword']);




/* Navigation Routes */

Route::get('/', [NavigationController::class, 'index'])->name('index');
Route::get('/search', [NavigationController::class, 'search']);
Route::get('/category/{name}', [NavigationController::class, 'category']);
Route::get('/single/{uuid}', [NavigationController::class, 'single']);
//Generic Navigation Route: for logic-less pages and 404
Route::get('/{param}', [NavigationController::class, 'static']);
