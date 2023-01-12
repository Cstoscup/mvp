<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store new listing data in database
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// store new photos in database
Route::post('/photos/{listing}', [PhotoController::class, 'store'])->middleware('auth');

// get all listings
Route::get('/', [ListingController::class, 'index']);

// show manage listings page
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// show information edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// show photos edit form
Route::get('/listings/{listing}/photos/edit', [PhotoController::class, 'edit'])->middleware('auth');

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

// get specific listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// delete photo
Route::delete('/photos/{photo}', [PhotoController::class, 'delete'])->middleware('auth');

// show create register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login');

// log a user in
Route::post('/users/verify', [UserController::class, 'verify']);

// store new user in database
Route::post('/users', [UserController::class, 'store']);

// logout
Route::post('/logout', [UserController::class, 'logout']);