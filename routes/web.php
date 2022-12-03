<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\RepositoryController;
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

// Login and Register Controller
Route::get('/register', [UserController::class, 'register'])->name('user.register')->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate');
Route::post('/store', [UserController::class, 'store'])->name('user.store');

// Home Page
Route::get('/', [ListingController::class, 'index'])->name('listing.index');
Route::get('/{id}', [ListingController::class, 'show'])->name('listing.show');

Route::middleware(['auth'])->group(function () {
    // Project Controller
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listing.create')->middleware('auth');
    Route::post('/listings', [ListingController::class, 'store'])->name('listing.store')->middleware('auth');
    Route::get('/listings/{id}', [ListingController::class, 'edit'])->name('listing.edit')->middleware('auth');
    Route::patch('/{id}', [ListingController::class, 'update'])->name('listing.update')->middleware('auth');
    Route::delete('/{id}', [ListingController::class, 'destroy'])->name('listing.destroy')->middleware('auth');

    Route::get('listing/manage', [ListingController::class, 'manage'])->name('listing.manage')->middleware('auth');

    // Repository Controller
    Route::prefix('/repository')->group(function () {
        Route::delete('/{id}', [RepositoryController::class, 'destroy'])->name('repository.destroy')->middleware('auth');
        Route::post('/', [RepositoryController::class, 'store'])->name('repository.store')->middleware('auth');
        Route::post('/create-folder', [RepositoryController::class, 'createFolder'])->name('repository.folder')->middleware('auth');
        Route::get('/{id}', [RepositoryController::class, 'show'])->name('repository.show')->middleware('auth');
    });
});

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');
