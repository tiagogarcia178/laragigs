<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //get and show all listings
    public function index()
    {
        //dd(request('tag')); //request params sent to the URL
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag']))
                ->get(),
        ]);
    }
    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }
}