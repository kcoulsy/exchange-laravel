<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    $news = News::where('is_published', true)->latest()->paginate(10);

    return view('news.index', compact('news'));
  }

  public function show(string $slug)
  {
    $news = News::where('slug', $slug)->where('is_published', true)->firstOrFail();

    return view('news.show', compact('news'));
  }
}