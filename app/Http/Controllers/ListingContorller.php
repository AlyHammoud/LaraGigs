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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
        ]);

//        return view('listings.index',[
//            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(5)
//        ]);
//        return view('listings.index',[
//            'listings' => Listing::latest()->filter([$request->query('tag')])->paginate(5)
//        ]);
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
            "logo" => "required"
        ]);

        if($request->hasFile('logo')){                              // new folder logos
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        //Session::flash('message', "listing Created");
        return redirect('/')->with('message','Listing Created Successfully!');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit',[
            'listing' => $listing
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            "title" => "required",
            "company" => "required",
            "location" => "required",
            "website" => "required",
            "email" => "required|email",
            "tags" => "required",
            "description" => "required",
        ]);

        if($request->hasFile('logo')){                              // new folder logos
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        //Session::flash('message', "listing Created");
        return back()->with('message','Listing Updated Successfully!');
    }

    public function delete(Listing $listing)
    {
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        return view('listings.manage',[
            'listings' => auth()->user()->listings()->get()
        ]);
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
