<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Listing;

class CategoriesController extends Controller
{
    public function index()
    {
        $sub_categories = Category::where('parent_id', null)->withCount('recursiveListings')->get();

        $listings = Listing::with(['media', 'category', 'brand', 'currency']);
        $selected_currencies = request()->input('currencies');
        $selected_currencies = strlen($selected_currencies) > 0 ? explode(',', $selected_currencies) : [];
        $selected_conditions = request()->input('conditions');
        $selected_conditions = strlen($selected_conditions) > 0 ? explode(',', $selected_conditions) : [];

        if (count($selected_currencies) > 0) {
            $listings = $listings->whereIn('currency_id', $selected_currencies);
        }

        if (count($selected_conditions) > 0) {
            $listings = $listings->whereIn('condition_id', $selected_conditions);
        }

        $min_price = request()->input('price_min');

        if (intval($min_price) > 0) {
            $listings = $listings->where('price', '>=', intval($min_price));
        }

        $max_price = request()->input('price_max');

        if (intval($max_price) > 0) {
            $listings = $listings->where('price', '<=', intval($max_price));
        }

        $hide_por = request()->input('hide_por');

        if ($hide_por == 'true') {
            $listings = $listings->where('is_por', false);
        }

        return view('categories.index')->with([
            'listings' => $listings->paginate(10),
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

        $listings = Listing::with('media')->with('category')->whereIn('category_id', $all_sub_categories);

        $selected_currencies = request()->input('currencies');
        $selected_currencies = strlen($selected_currencies) > 0 ? explode(',', $selected_currencies) : [];
        $selected_conditions = request()->input('conditions');
        $selected_conditions = strlen($selected_conditions) > 0 ? explode(',', $selected_conditions) : [];

        if (count($selected_currencies) > 0) {
            $listings = $listings->whereIn('currency_id', $selected_currencies);
        }

        if (count($selected_conditions) > 0) {
            $listings = $listings->whereIn('condition_id', $selected_conditions);
        }

        $min_price = request()->input('price_min');

        if (intval($min_price) > 0) {
            $listings = $listings->where('price', '>=', intval($min_price));
        }

        $max_price = request()->input('price_max');

        if (intval($max_price) > 0) {
            $listings = $listings->where('price', '<=', intval($max_price));
        }

        $hide_por = request()->input('hide_por');

        if ($hide_por == 'true') {
            $listings = $listings->where('is_por', false);
        }

        return view('categories.index')->with([
            'listings' => $listings->paginate(10),
            'sub_categories' => $sub_categories,
            'conditions' => Condition::all(),
            'currencies' => Currency::all(),
            'selected_conditions' => $selected_conditions,
            'selected_currencies' => $selected_currencies,
            'price_min' => request()->input('price_min'),
            'price_max' => request()->input('price_max'),
            'hide_por' => request()->input('hide_por'),
            'parent_category' => $parent_category,
            'category' => $category,
        ]);
    }
}