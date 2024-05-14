<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

//get all listings
Route::get('/', [ListingController::class, 'index']);

//create listing
Route::get('/listings/create', [ListingController::class, 'create']);

//store single listing
Route::post('/listings', [ListingController::class, 'store']);

//show single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);