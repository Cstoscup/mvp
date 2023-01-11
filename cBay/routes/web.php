<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
Route::get('/listings/create', [ListingController::class, 'create']);

// store new listing data in database
Route::post('/listings', [ListingController::class, 'store']);

// get all listings
Route::get('/', [ListingController::class, 'index']);

// get specific listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);