<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SubCategory;

class DetailsController extends Controller
{
    public function index(Request $request, $id)
    {
        $articles = Article::where('slug', $id)->firstOrFail();

        $find_article = Article::all();

        $sub_categories = SubCategory::all();

        // $isPublikasi = false;
        // $isDetails = true;
        return view('pages.detail-artikel', compact('articles', 'sub_categories', 'find_article'));
    }
}
