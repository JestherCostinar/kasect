<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/', [UserController::class, 'store'])->name('user.store');
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/', [UserController::class, 'authenticate'])->name('user.authenticate');

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');


// LISTING CONTROLLER
Route::get('/', [ListingController::class, 'index'])->name('listing.index');
Route::get('/listings/create', [ListingController::class, 'create'])->name('listing.create');
Route::post('/listings', [ListingController::class, 'store'])->name('listing.store');
Route::get('/{id}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/listings/{id}', [ListingController::class, 'edit'])->name('listing.edit');
Route::patch('/{id}', [ListingController::class, 'update'])->name('listing.update');
Route::delete('/{id}', [ListingController::class, 'destroy'])->name('listing.destroy');

// USER CONTROLLER
Route::get('/login', [UserController::class, 'login'])->name('user.login');