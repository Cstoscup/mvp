<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Listing;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request) {
        $url = $request->getRequestUri();
        $url_parts = explode('/photos/', $url);
        $id = $url_parts[1];

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

        return back()->with('message', 'Photos added successfully!');
    }

    // show edit form
    public function edit(Listing $listing) {
        return view('/photos.edit', ['photos' => $listing->photo, 'id' => $listing->id]);
    }

    // delete photo
    public function delete(Photo $photo) {
        $id = $photo->listing_id;

        $photo->delete();

        return back()->with('message', 'Photo deleted successfully!');
    }

}
