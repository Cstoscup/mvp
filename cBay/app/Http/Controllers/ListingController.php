<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tag;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::with('tag')->filter(request(['tag', 'search']))->get()
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create() {
        return view('listings.create');
    }

    // store new listing data in database
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', new PhoneNumber],
        ]);

        $tags = explode(', ', request('tags'));

        $listing = new Listing();
        $listing -> fill($formFields);
        $listing -> save();
        $id = $listing->id;

        foreach($tags as $tag) {
            $tags_post = [
                'listing_id' => $id,
                'tag' => $tag
            ];
            $tag = new Tag();
            $tag -> fill($tags_post);
            $tag -> save();
        }

        // Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
