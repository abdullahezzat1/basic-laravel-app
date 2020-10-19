<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\AccountFormsController;
use App\Http\Controllers\AccountPagesController;
use App\Http\Controllers\OtherFormsController;
use App\Http\Controllers\OtherPagesController;

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
//get
Route::get('/account/verify/email/{token}', [AccountPagesController::class, 'verifyEmail']);
Route::get('/message/verification-email', [AccountPagesController::class, 'emailVerificationMessage']);
Route::get('/message/password-reset-email', [AccountPagesController::class, 'passwordResetEmailMessage']);
Route::get('/account/reset-password/{token}', [AccountPagesController::class, 'resetPassword']);
Route::get('/account/logout', [AccountPagesController::class, 'logout']);

//post
Route::post('/account/forms/register', [AccountFormsController::class, 'handleRegistrationForm']);
Route::post('/account/forms/resend-verification-email', [AccountFormsController::class, 'resendVerificationEmail']);
Route::post('/account/forms/login', [AccountFormsController::class, 'handleLoginForm']);
Route::post('/account/forms/forgot', [AccountFormsController::class, 'handleForgotPasswordForm']);
Route::post('/account/forms/resend-password-reset-email', [AccountFormsController::class, 'resendPasswordResetEmail']);
Route::post('/account/forms/reset-password', [AccountFormsController::class, 'resetPassword']);
Route::post('/account/forms/change-email', [AccountFormsController::class, 'changeEmail']);
Route::post('/account/forms/change-password', [AccountFormsController::class, 'changePassword']);
Route::post('/account/forms/delete-account', [AccountFormsController::class, 'deleteAccount']);


/* Other routes */
//get
Route::get('newsletter/success', [OtherPagesController::class, 'newsletterSuccess']);

//post
Route::post('/other/forms/newsletter', [OtherFormsController::class, 'subscribeToNewsletter']);
Route::post('/other/forms/contact', [OtherFormsController::class, 'saveContactMessage']);



/* Navigation Routes */

Route::get('/', [NavigationController::class, 'index'])->name('index');
Route::get('/search', [NavigationController::class, 'search']);
Route::get('/category/{name}', [NavigationController::class, 'category']);
Route::get('/single/{uuid}', [NavigationController::class, 'single']);
//Generic Navigation Route: for logic-less pages and 404
Route::get('/{param}', [NavigationController::class, 'static']);
