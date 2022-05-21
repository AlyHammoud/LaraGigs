<?php

use App\Models\Listing;
use \App\Http\Controllers\ListingContorller;
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


//all listings
Route::get('/', [ListingContorller::class, 'index']);

//show create Form
Route::get('/listings/create', [ListingContorller::class, 'create'])->name('listing.create');

//store listing data
Route::post('/listings', [ListingContorller::class, 'store'])->name('listings.store');




//single listing
Route::get('/listings/{listing}', [ListingContorller::class, 'show']);

