<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;

use Illuminate\Http\Request;

class InovasiPanganController extends Controller
{
    public function index()
    {

        $articles = Article::whereNull('deleted_at')->take(5)->latest()->get();

        $videos = Video::whereNull('deleted_at')->take(6)->latest()->get();

        return view('pages.inovasi-pangan', compact('articles', 'videos'));
    }
}
