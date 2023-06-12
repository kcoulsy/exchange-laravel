<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();

        return response()->view('sitemap.index', [
            'categories' => $categories,
        ]);
    }
}