<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $sub_categories = Category::where('parent_id', null)->withCount('recursiveListings')->get();

        $listings = Listing::with('media')->with('category')->paginate(10);

        return view('categories.index')->with(['listings' => $listings, 'sub_categories' => $sub_categories]);
    }

    public function show(Category $category)
    {
        $all_sub_categories = $category->descendantsAndSelf()->pluck('id')->toArray();
        $parent_category = $category->parent()->first();
        $sub_categories = $category->children()->withCount('recursiveListings')->get();

        $listings = Listing::with('media')->with('category')->whereIn('category_id', $all_sub_categories)->paginate(10);

        return view('categories.index')->with([
            'listings' => $listings,
            'sub_categories' => $sub_categories,
            'category' => $category,
            'parent_category' => $parent_category
        ]);
    }
}