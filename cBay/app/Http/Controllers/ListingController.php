<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use App\Models\Listing;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
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
        $email = Auth::user()->email;
        return view('listings.create', ['email' => $email]);
    }

    // show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'tags' => ['required'],
            'city' => 'required',
            'state' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', new PhoneNumber],
        ]);

        $listing->update($formFields);
        $id = $listing->id;

        if ($request->hasFile( key: 'photo-1' )) {
            $file = $request->file( key: 'photo-1' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-2' )) {
            $file = $request->file( key: 'photo-2' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-3' )) {
            $file = $request->file( key: 'photo-3' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-4' )) {
            $file = $request->file( key: 'photo-4' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-5' )) {
            $file = $request->file( key: 'photo-5' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        return back()->with('message', 'Listing updated successfully!');
    }

    // store new listing data in database
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'tags' => ['required'],
            'city' => 'required',
            'state' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', new PhoneNumber],
        ]);

        $user_id = auth()->id();

        $formFields['user_id'] = $user_id;

        $listing = Listing::create($formFields);
        $id = $listing->id;

        if ($request->hasFile( key: 'photo-1' )) {
            $file = $request->file( key: 'photo-1' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-2' )) {
            $file = $request->file( key: 'photo-2' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-3' )) {
            $file = $request->file( key: 'photo-3' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-4' )) {
            $file = $request->file( key: 'photo-4' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        if ($request->hasFile( key: 'photo-5' )) {
            $file = $request->file( key: 'photo-5' );
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 's3' );
            Photo::create([
                'listing_id' => $id,
                'photo_url' => 'https://cbay.s3.us-east-2.amazonaws.com/' . $path
            ]);
        }

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // delete listing
    public function delete(Listing $listing) {
        foreach($listing->photo as $photo) {
            $photo->delete();
        }

        $listing->delete();

        return redirect('/listings/manage')->with('message', 'Listing deleted successfully!');
    }

    // manage listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listing()->get()]);
    }
}
