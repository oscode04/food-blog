<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SubCategory;

class LandingPageController extends Controller
{
    public function index()
    {

        $main_articles = Article::whereNull('deleted_at')->take(1)->latest()->get();

        $hot_articles = Article::whereNull('deleted_at')->take(3)->latest()->get();

        $articles = Article::whereNull('deleted_at')->take(5)->latest()->get();

        $sub_categories = SubCategory::get();

        return view('pages.landing-page', compact('articles', 'main_articles', 'hot_articles', 'sub_categories'));
    }
}
