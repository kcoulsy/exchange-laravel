<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $sub_categories = Category::where('parent_id', null)->get();

        $sub_categories_with_full_count = $sub_categories->map(function ($sub_category) {
            $sub_category->listings_count = $sub_category->getFlatDescendantsAttribute()->map(function ($sub_category) {
                return $sub_category->listings()->count();
            })->sum() + $sub_category->listings()->count();
            return $sub_category;
        });

        $listings = Listing::paginate(10);

        return view('categories.index')->with(['listings' => $listings, 'sub_categories' => $sub_categories_with_full_count]);
    }

    public function show(Category $category)
    {
        $all_sub_categories = $category->getFlatDescendantsAttribute()->pluck('id');
        $parent_category = $category->parent()->first();
        $sub_categories = $category->children()->get();

        $sub_categories_with_full_count = $sub_categories->map(function ($sub_category) {
            $sub_category->listings_count = $sub_category->getFlatDescendantsAttribute()->map(function ($sub_category) {
                return $sub_category->listings()->count();
            })->sum() + $sub_category->listings()->count();
            return $sub_category;
        });

        $listings = Listing::whereIn('category_id', [$category->id, ...$all_sub_categories->toArray()])->with('media')->paginate(10);

        return view('categories.index')->with([
            'listings' => $listings,
            'sub_categories' => $sub_categories_with_full_count,
            'category' => $category,
            'parent_category' => $parent_category
        ]);
    }
}