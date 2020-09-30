<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BreadController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DrinksController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FrozenController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ShortCodesController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\VegetablesController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/about.html', [AboutController::class, 'handle']);
Route::get('/events.html', [EventsController::class, 'handle']);
Route::get('/index.html', [IndexController::class, 'handle']);
Route::get('/payment.html', [PaymentController::class, 'handle']);
Route::get('/services.html', [ServicesController::class, 'handle']);
Route::get('/welcome.html', [WelcomeController::class, 'handle']);
Route::get('/bread.html', [BreadController::class, 'handle']);
Route::get('/faqs.html', [FaqsController::class, 'handle']);
Route::get('/kitchen.html', [KitchenController::class, 'handle']);
Route::get('/pet.html', [PetController::class, 'handle']);
Route::get('/short-codes.html', [ShortCodesController::class, 'handle']);
Route::get('/checkout.html', [CheckoutController::class, 'handle']);
Route::get('/frozen.html', [FrozenController::class, 'handle']);
Route::get('/login.html', [LoginController::class, 'handle']);
Route::get('/privacy.html', [PrivacyController::class, 'handle']);
Route::get('/single.html', [SingleController::class, 'handle']);
Route::get('/drinks.html', [DrinksController::class, 'handle']);
Route::get('/household.html', [HouseholdController::class, 'handle']);
Route::get('/mail.html', [MailController::class, 'handle']);
Route::get('/products.html', [ProductsController::class, 'handle']);
Route::get('/vegetables.html', [VegetablesController::class, 'handle']);
