<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Listing;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $sub_categories = Category::where('parent_id', null)->withCount('recursiveListings')->get();

        $listings = Listing::with('media')->with('category')->paginate(10);

        $selected_currencies = request()->input('currencies');
        $selected_currencies = strlen($selected_currencies) > 0 ? explode(',', $selected_currencies) : [];
        $selected_conditions = request()->input('conditions');
        $selected_conditions = strlen($selected_conditions) > 0 ? explode(',', $selected_conditions) : [];

        return view('categories.index')->with([
            'listings' => $listings,
            'sub_categories' => $sub_categories,
            'conditions' => Condition::all(),
            'currencies' => Currency::all(),
            'selected_conditions' => $selected_conditions,
            'selected_currencies' => $selected_currencies,
            'price_min' => request()->input('price_min'),
            'price_max' => request()->input('price_max'),
            'hide_por' => request()->input('hide_por'),
        ]);
    }

    public function show(Category $category)
    {
        $all_sub_categories = $category->descendantsAndSelf()->pluck('id')->toArray();
        $parent_category = $category->parent()->first();
        $sub_categories = $category->children()->withCount('recursiveListings')->get();

        $listings = Listing::with('media')->with('category')->whereIn('category_id', $all_sub_categories)->paginate(10);

        $selected_currencies = request()->input('currencies');
        $selected_currencies = strlen($selected_currencies) > 0 ? explode(',', $selected_currencies) : [];
        $selected_conditions = request()->input('conditions');
        $selected_conditions = strlen($selected_conditions) > 0 ? explode(',', $selected_conditions) : [];

        return view('categories.index')->with([
            'listings' => $listings,
            'sub_categories' => $sub_categories,
            'category' => $category,
            'parent_category' => $parent_category,
            'conditions' => Condition::all(),
            'currencies' => Currency::all(),
            'selected_conditions' => $selected_conditions,
            'selected_currencies' => $selected_currencies,
            'price_min' => request()->input('price_min'),
            'price_max' => request()->input('price_max'),
            'hide_por' => request()->input('hide_por'),
        ]);
    }
}