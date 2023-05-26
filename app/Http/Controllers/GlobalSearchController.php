<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');

        $categories = Category::search($query)->take(3)->get();
        $listings = Listing::search($query)->paginate(5)->load('category');

        return response()->json([
            'categories' => $categories,
            'listings' => $listings
        ]);
    }
}