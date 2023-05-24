<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $listings = Listing::paginate(2);

        return view('categories.index')->with('listings', $listings);
    }
}