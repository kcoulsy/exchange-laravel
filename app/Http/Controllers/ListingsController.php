<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function create()
    {
        return view('listings.create');
    }

    public function show(Category $category, Listing $listing)
    {
        // dd([
        //     'category' => $category,
        //     'listing' => $listing
        // ]);
        return view('listings.show', [
            'category' => $category,
            'listing' => $listing
        ]);
    }
}