<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('pages.produk');
    }
}
