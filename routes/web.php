<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

Route::get('/', function () {
    return view('listings', [
        'listings' => Listing::allListings()
    ]);
});

Route::get('/listing/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});