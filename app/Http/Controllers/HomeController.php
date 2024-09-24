<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Category;
use App\Models\News;
use CyrildeWit\EloquentViewable\Support\Period;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the latest 3 listings
        $latestListings = Listing::with(['currency', 'category'])->latest()->take(3)->get();

        // Fetch top-level categories (categories without a parent_id)
        $topLevelCategories = Category::whereNull('parent_id')->get();

        // Fetch the top 4 listings based on views for the past month
        $popularListings = Listing::with(['currency', 'category', 'media'])
            ->whereNotIn('id', $latestListings->pluck('id'))
            ->orderByViews('desc', Period::pastMonths(1))
            ->take(4)
            ->get();

        // Fetch the latest 2 published news articles
        $latestNews = News::where('is_published', true)->latest()->take(2)->get();

        // Pass the listings, categories, and news to the view
        return view('welcome', compact('latestListings', 'topLevelCategories', 'popularListings', 'latestNews'));
    }
}
