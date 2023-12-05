<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hot_articles = Article::whereNull('deleted_at')->where('id_categories', '===', '1')->take(3)->get();
        $articles = Article::whereNull('deleted_at')->take(5)->latest()->get();
        return view('page.home', compact('articles'));
    }
}
