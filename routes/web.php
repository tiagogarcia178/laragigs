<?php

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

// All Listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all(),
    ]);
});

//Single Listing
//route model binding way
Route::get('/listing/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' => $listing,
    ]);
});

/* Route::get("/hello", function () {
    //text and status code, network status informations
    return response("<h1>Hello World</h1>", 200)->header(
        "Content-Type",
        "text/plain"
    );
});

//wildcard, input: "/posts/1", output: "Post 1"
Route::get("posts/{id}", function ($id) {
    ddd($id);
    return response("Post " . $id);
})->where("id", "[0-9]+"); //route constraint

//"Request class" was brought in by right click and import class, PHP Namespace Resolver
Route::get("/search", function (Request $request) {
    dd($request->name . "," . $request->city);
}); */