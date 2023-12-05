<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Documentation;
use App\Models\Video;
use League\CommonMark\Node\Block\Document;

class AdminController extends Controller
{
    public function index()
    {
        // $jumlahArtikel = Article::count();
        // $jumlahDokumentasi = Documentation::count();
        // $jumlahVid = Video::count();

        return view(
            'pages.admin.dashboard',
            // ['jumlahArtikel' => $jumlahArtikel, 'jumlahVid' => $jumlahVid, 'jumlahDokumentasi' => $jumlahDokumentasi],
        );
    }
}
