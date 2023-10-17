<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AthurController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Client\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Client\ClientBookController;

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
//Home
Route::get('/', [HomeController::class, 'index'])->name('client.home');


// client.cart.create
Route::post('/cart/create', [CartController::class, 'create'])->name('client.cart.create');
//client home
Route::get('/', [HomeController::class, 'index'])->name('client.home');
// client.detail
Route::get('/detail/{book}', [ClientBookController::class, 'detail'])->name('client.detail');
// cart
Route::get('/cart', [CartController::class, 'index'])->name('client.cart');
//client.cart.update
Route::post('/cart/update', [CartController::class, 'update'])->name('client.cart.update');
// client.cart.delete
Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('client.cart.delete');
Route::get('/cart/delete', [CartController::class, 'destroyAll'])->name('client.cart.deleteAll');
//client.promotion post
Route::post('/promotion/addPromotion', [ClientPromotionController::class, 'addPromotion'])->name('client.promotion.addToCart');
//order
Route::get('/order', [OrderController::class, 'index'])->name('client.order.index');
// client.order.create
Route::post('/order/create', [OrderController::class, 'create'])->name('client.order.create');
//client.order.list
Route::get('/order/list', [OrderController::class, 'list'])->name('client.order.list');
// client.order.detail
Route::get('/order/detail/{order}', [OrderController::class, 'detail'])->name('client.order.detail');
Route::middleware('auth')->group(function () {
	//client.profile
	Route::get('/profile', [ProfileController::class, 'index'])->name('client.profile');
	// client.profile.update
	Route::post('/profile/update', [ProfileController::class, 'update'])->name('client.profile.update');
	Route::post('/review/store', [ReviewController::class, 'store'])->name('client.rating.store');
});

//Auth
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//admin
Route::group(['prefix' => 'admin'], function () {

	//Dashboard
	Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

	//Author
	Route::get('/Author', [AthurController::class, 'index'])->name('admin.author');
	Route::get('/Author/create', [AthurController::class, 'create'])->name('admin.author.create');
	Route::post('/Author', [AthurController::class, 'store'])->name('admin.author.store');
	Route::get('/Author/edit/{id}', [AthurController::class, 'edit'])->name('admin.author.edit');
	Route::put('/Author/update/{id}', [AthurController::class, 'update'])->name('admin.author.update');
	Route::get('/Author/delete/{id}', [AthurController::class, 'destroy'])->name('admin.author.delete');


	//Genre
	Route::get('/Genre', [GenreController::class, 'index'])->name('admin.genre');
	Route::get('/Genre/create', [GenreController::class, 'create'])->name('admin.genre.create');
	Route::post('/Genre', [GenreController::class, 'store'])->name('admin.genre.store');
	Route::get('/Genre/edit/{id}', [GenreController::class, 'edit'])->name('admin.genre.edit');
	Route::put('/Genre/update/{id}', [GenreController::class, 'update'])->name('admin.genre.update');
	Route::get('/Genre/delete/{id}', [GenreController::class, 'destroy'])->name('admin.genre.delete');

	//Promotion
	Route::get('/Promotion', [PromotionController::class, 'index'])->name('admin.promotion');
	Route::get('/Promotion/create', [PromotionController::class, 'create'])->name('admin.promotion.create');
	Route::post('/Promotion', [PromotionController::class, 'store'])->name('admin.promotion.store');
	Route::get('/Promotion/edit/{id}', [PromotionController::class, 'edit'])->name('admin.promotion.edit');
	Route::put('/Promotion/update/{id}', [PromotionController::class, 'update'])->name('admin.promotion.update');
	Route::get('/Promotion/delete/{id}', [PromotionController::class, 'destroy'])->name('admin.promotion.delete');

	//Banner
	Route::get('/Banner', [BannerController::class, 'index'])->name('admin.banner');
	Route::get('/Banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
	Route::post('/Banner', [BannerController::class, 'store'])->name('admin.banner.store');
	Route::get('/Banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
	Route::put('/Banner/update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
	Route::get('/Banner/delete/{id}', [BannerController::class, 'destroy'])->name('admin.banner.delete');

	//Invoice
	Route::get('/Invoice', [InvoiceController::class, 'index'])->name('admin.invoice');
	Route::get('/Invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('admin.invoice.edit');
	Route::put('/Invoice/update/{id}', [InvoiceController::class, 'update'])->name('admin.invoice.update');

	//Book
	Route::get('/Book', [BookController::class, 'index'])->name('admin.book');
	Route::get('/Book/create', [BookController::class, 'create'])->name('admin.book.create');
	Route::post('/Book', [BookController::class, 'store'])->name('admin.book.store');
	Route::get('/Book/edit/{id}', [BookController::class, 'edit'])->name('admin.book.edit');
	Route::put('/Book/update/{id}', [BookController::class, 'update'])->name('admin.book.update');
	Route::get('/Book/delete/{id}', [BookController::class, 'destroy'])->name('admin.book.delete');

	//rating
	Route::get('/rating', [RatingController::class, 'index'])->name('admin.rating');
	Route::get('/rating/delete/{id}', [RatingController::class, 'destroy'])->name('admin.rating.delete');

	//User
	Route::get('/User', [UserController::class, 'index'])->name('admin.user');
	Route::get('/User/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
});
