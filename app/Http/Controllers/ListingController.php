<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Get and show all listings
    public function index()
    {
        //dd(request('tag')); //request params sent to the URL
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->get(),
        ]);
    }
    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    //Show create form
    public function create()
    {
        return view('listings.create');
    }

    //Store Listing Data
    public function store(Request $request)
    {
        /* dd($request->all()); */
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing Created successfully!');
    }
}