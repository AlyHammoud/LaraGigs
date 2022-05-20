<?php

use App\Models\Listing;
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
Route::get('/', function(){
    return view('listings',[
        'heading' => 'latest Listing',
        'listings' => Listing::all()
    ]);
});

//single listing
Route::get('/listings/{id}', function($id){
    $listing = Listing::find($id);

    if($listing){
        return view('listing', [
            'listing' => $listing
        ]);
    }
    return redirect('/');
});
