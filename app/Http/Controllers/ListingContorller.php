<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ListingContorller extends Controller
{
    public function index(Request $request)
    {
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            "title" => "required",
            "company" => "required|unique:listings",
            "location" => "required",
            "website" => "required",
            "email" => "required|email",
            "tags" => "required",
            "description" => "required",
        ]);

        Listing::create($formFields);

        //Session::flash('message', "listing Created");
        return redirect('/')->with('message','Listing Created Successfully!');
    }
}
//company" => "sdf"
//  "title" => "sdf"
//  "location" => "sdf"
//  "email" => "sdf"
//  "website" => "sdf"
//  "tags" => "sdf"
//  "logo" => "download.jpg"
//  "description" => "dfsdf"
//]
