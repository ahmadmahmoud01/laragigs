<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index() {
        return view('listings.index',[
            'listings' => Listing::latest()->paginate(6)
            // simplePaginate(6)
        ]);

    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Create form
    public function create() {
        return view('listings.create');
    }

    // Store Listing
    public function store(Request $request) {
        $formfields = $request->validate([
            'company' => ['required', Rule::unique('listings','company')],
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        $formfields['user_id'] = auth()->id();

        Listing::create($formfields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }

    // Edit Listing

    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // Update Listing

    public function update(Request $request, Listing $listing) {

        $formfields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        $listing->update($formfields);

        return redirect('/')->with('message', 'Listing Updated Successfully!');

    }

    //Delete Listing

    public function delete(Listing $listing) {
        $listing->delete();

        return redirect('/')->with('message', 'Listing Deleted Successfully!');
    }
}
