<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingContorller extends Controller
{
    public function index(Request $request)
    {
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}