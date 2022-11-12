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

// USER CONTROLLER

Route::get('/register', [UserController::class, 'register'])->name('user.register')->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');


// OPTIMIZE VERSION OF PROJECT CONTROLLER
Route::prefix('/projects')->group(function() {
    Route::get('/', [ListingController::class, 'index'])->name('project.index');
    Route::get('/{id}', [ListingController::class, 'show'])->name('project.show');
    Route::get('/create', [ListingController::class, 'create'])->name('project.create');
    Route::post('/', [ListingController::class, 'store'])->name('project.store');
    Route::get('/edit/{id}', [ListingController::class, 'edit'])->name('project.edit');
    Route::patch('/{id}', [ListingController::class, 'update'])->name('project.update');
    Route::delete('/{id}', [ListingController::class, 'destroy'])->name('project.destroy');
}->middleware('auth')->name('projects');


Route::get('/', [ListingController::class, 'index'])->name('listing.index');
Route::get('/listings/create', [ListingController::class, 'create'])->name('listing.create')->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->name('listing.store')->middleware('auth');
Route::get('/{id}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/listings/{id}', [ListingController::class, 'edit'])->name('listing.edit')->middleware('auth');
Route::patch('/{id}', [ListingController::class, 'update'])->name('listing.update')->middleware('auth');
Route::delete('/{id}', [ListingController::class, 'destroy'])->name('listing.destroy')->middleware('auth');

Route::get('listing/manage', [ListingController::class, 'manage'])->name('listing.manage')->middleware('auth');