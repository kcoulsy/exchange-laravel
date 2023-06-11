<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;

class ListingsController extends Controller
{
    public function create()
    {
        $user_subscription = auth()->user()->subscription('default');
        $can_create_listing = $user_subscription && !$user_subscription->canceled();

        // if (! $can_create_listing) {
        //     request()->session()->flash('flash.banner', 'You must be subscribed to create a listing.');

        //     return redirect()->route('dashboard');
        // }

        return view('listings.create');
    }

    public function show(Category $category, Listing $listing)
    {
        views($listing)->record();

        return view('listings.show', [
            'category' => $category,
            'listing' => $listing,
        ]);
    }
}