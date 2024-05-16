<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->where(request(['tags', 'search']))->paginate(6)
        ]);
    }

    //show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create() {
        return view('listings.create');
    }

    //store listing
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            // 'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    //show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing'=>$listing]);
    }

    //update listing data
    public function update(Request $request, Listing $listing) {
        //make sure loged in user is owner

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            // 'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully');
    }

    //delete listing
    public function destroy(Listing $listing) {
        if($listing->user_id != auth()->id()) {
            abort(403, 'unauthorized action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    //manage listings
    public function manage() {
        $user = auth()->user();
        $listings = $user->listings;

        return view('listings.manage', ['listings' => $listings]);
    }   
}