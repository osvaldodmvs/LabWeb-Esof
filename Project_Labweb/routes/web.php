<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GiftcardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PDFController;

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

Auth::routes(['verify'=>true]);

//Routes that Guests can access

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/viral', [GuestController::class, 'viral'])->name('viral');
Route::get('/products', [ProductController::class, 'index_guest'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show_guest'])->name('products_show_guest');
Route::get('/events', [GuestController::class, 'events'])->name('events');
Route::get('/contacts', [GuestController::class, 'contacts'])->name('contacts');
Route::get('/faq', [GuestController::class, 'faq'])->name('faq');
Route::get('/privacy_policy', [GuestController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_conditions', [GuestController::class, 'terms_conditions'])->name('terms_conditions');
Route::get('/giftcard', [GiftcardController::class, 'show_guest'])->name('giftcard_show_guest');

Route::post('/mail_events', [MailController::class, 'mail_events'])->name('mail_events');
Route::post('/mail_teambuilding', [MailController::class, 'mail_teambuilding'])->name('mail_teambuilding');

//Admin Login Route

Route::get('/admin', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('is_admin');

//Must be logged-in Routes

Route::get('/account', [HomeController::class, 'account'])->name('account');
//Route::get('/account/edit/{user}', [HomeController::class, 'account_edit'])->name('account_edit');

//Resource-related Routes

Route::get('/users', [UserController::class, 'index'])->name('users_index')->middleware('is_admin');
Route::get('/users/create', [UserController::class, 'create'])->name('users_create')->middleware('is_admin');
Route::post('/users', [UserController::class, 'store'])->name('users_index_store')->middleware('is_admin');

Route::get('/product', [ProductController::class, 'index'])->name('products_index')->middleware('is_admin');
Route::get('/product/create', [ProductController::class, 'create'])->name('products_create')->middleware('is_admin');
Route::post('/product', [ProductController::class, 'store'])->name('products_index_store')->middleware('is_admin');

Route::get('/items', [ItemController::class, 'index'])->name('items_index')->middleware('is_admin');
Route::post('/items', [ItemController::class, 'store'])->name('items_index_store')->middleware('is_admin');

Route::get('/orders', [OrderController::class, 'index'])->name('orders_index')->middleware('is_admin');
Route::post('/orders', [OrderController::class, 'store'])->name('orders_index_store')->middleware('is_admin');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments_index')->middleware('is_admin');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments_index_store')->middleware('is_admin');

//routes related to specific user passed as parameter , admin only

Route::get('/users/show/{user}', [UserController::class, 'show'])->name('users_show')->middleware('is_admin');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users_edit')->middleware('is_admin');
Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users_update')->middleware('is_admin');
Route::post('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users_destroy')->middleware('is_admin');

Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('products_show')->middleware('is_admin');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products_edit')->middleware('is_admin');
Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products_update')->middleware('is_admin');
Route::post('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('products_destroy')->middleware('is_admin');

Route::get('/items/show/{item}', [ItemController::class, 'show'])->name('items_show')->middleware('is_admin');

Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('orders_show')->middleware('is_admin');

Route::get('/payments/show/{payment}', [PaymentController::class, 'show'])->name('payments_show')->middleware('is_admin');

Route::post('/cart_gift', [CartController::class, 'add_giftcard'])->name('cart_add_giftcard')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart_index')->middleware('auth');
Route::post('/cart', [CartController::class, 'add'])->name('cart_add')->middleware('auth');
Route::post('/cart_remove', [CartController::class, 'remove'])->name('cart_remove')->middleware('auth');
Route::post('/cart_update', [CartController::class, 'update'])->name('cart_update')->middleware('auth');
Route::get('/cart_clear', [CartController::class, 'clear'])->name('cart_clear')->middleware('auth');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/pay', [CartController::class, 'pay'])->name('pay')->middleware('auth');

Route::get('/success', [CartController::class, 'success'])->name('payment_success')->middleware('auth');

Route::get('/pdf', [PDFController::class, 'generatePDF'])->name('pdf')->middleware('auth');


