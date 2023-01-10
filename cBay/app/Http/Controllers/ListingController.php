<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    public function index() {
        $tag = request('tag');
        $search = request('search');

        if($search) {
            return view('listings.index', [
                'listings' => Listing::with('tag')
                                ->whereRelation('tag', 'tag', 'like', '%' . $search . '%')
                                ->orWhere('title', 'like', '%' . $search . '%')
                                ->orWhere('description', 'like', '%' . $search . '%')
                                ->orWhere('city', 'like', '%' . $search . '%')
                                ->orWhere('state', 'like', '%' . $search . '%')
                                ->get()
            ]);
        }


        return view('listings.index', [
            'listings' => Listing::with('tag')
                            ->whereRelation('tag', 'tag', 'like', '%' . $tag . '%')
                            ->get()
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
