<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[IndexController::class,'show']);

Route::get('/books-list',[PublicController::class,'bookList']);

Route::get('/search',[SearchController::class,'show']);
Route::post('/search',[SearchController::class,'search']);

Route::get('/enroll',[EnrollController::class,'show'])->name('enroll');

Route::post('/enroll',[EnrollController::class,'add']);


Route::get('/add-product',[ProductController::class,'add_show']);
Route::post('/add-product',[ProductController::class,'add'])->name('add-product');

Route::get('/products',[ProductController::class,'show']);
Route::get('/edit-product/{id}',[ProductController::class,'edit_show']);
Route::put('/edit-product/{id}',[ProductController::class,'edit']);
Route::delete('/edit-product/{id}',[ProductController::class,'delete']);
Route::post('/edit-product/{id}',[ProductController::class,'recovery']);

Route::get('/dashboard',[IndexController::class,'dashboard_view']);

Route::get('/add-category',[CategoryController::class,'show'])->name('add-category');
Route::post('/add-category',[CategoryController::class,'add']);
Route::get('/categories',[CategoryController::class,'index']);
Route::delete('/categories/{id}',[CategoryController::class,'delete']);

Route::get('/edit-category/{id}',[CategoryController::class,'edit_view']);
Route::put('/edit-category/{id}',[CategoryController::class,'edit']);

Route::get('book-page/{id}',[BookController::class,'index']);

Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/user_panel',[UserController::class,'show'])->name('user_panel');

Route::post('/add-score/{id}',[ScoreController::class,'add']);
Route::post('/add-comment/{id}',[ScoreController::class,'comment']);

Route::get('/download-demo/{id}',[BookController::class,'demo']);
Route::get('/download-book/{id}',[BookController::class,'book']);

Route::post('/add-basket/{id}',[ShopController::class,'add']);

Route::get('/shopping-basket',[ShopController::class,'basket']);
Route::delete('/shopping-basket/{id}',[ShopController::class,'delete']);
Route::post('/shopping-basket/{id}',[ShopController::class,'pay']);

Route::get('/my-books',[UserController::class,'books']);

Route::get('/edit-profile',[UserController::class,'edit_show']);
Route::put('/edit-profile',[UserController::class,'edit']);

Route::get('/report-orders',[ProductController::class,'report']);

Route::get('/category-books/{id}',[CategoryController::class,'books']);
Route::get('/categories-list',[CategoryController::class,'list']);

require __DIR__.'/auth.php';

Auth::routes();
