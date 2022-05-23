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
Route::get('/listings/create', [ListingContorller::class, 'create'])->name('listing.create')->middleware('auth');

//store listing data
Route::post('/listings', [ListingContorller::class, 'store'])->name('listings.store')->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [ListingContorller::class, 'edit'])->name('listing.edit')->middleware('auth');

//Update listing
Route::put('/listings/{listing}', [ListingContorller::class, 'update'])->name('listing.update')->middleware('auth');

//Delete a listing
Route::delete('/listings/{listing}', [ListingContorller::class, 'delete'])->name('listing.delete')->middleware('auth');

//register
Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create')->middleware('guest');

//create new user
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);

//log user out
Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login')->middleware('guest');

//manage Listings
Route::get('/listings/manage', [ListingContorller::class, 'manage'])->middleware('auth');

//login
Route::post('/users/authenticate', [\App\Http\Controllers\UserController::class, 'authenticate']);




//single listing
Route::get('/listings/{listing}', [ListingContorller::class, 'show']);

