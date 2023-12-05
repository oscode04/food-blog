<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Article::with(['video', 'category', 'subCategory']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <ul class="dropdown-menu" action' .  $item->id . '">
                                <li>
                                    <a class="dropdown-item" href="' . route('article.edit', $item->id) . '">Edit</a>
                                </li>
                                <li>
                                    <form action = "' . route('article.destroy', $item->id) . '" method="POST">
                                        ' . method_field('DELETE') . csrf_field() . '
                                        <button type="submit" class="dopdown-item text-danger ms-2"  style="background-color: transparent; border: none;">
                                            Hapus
                                        </button>
                                    </form>
                                </li>
                                </ul>
                            </div>';
                })
                ->editColumn('main_img', function ($item) {
                    return $item->main_img ? '<img src="' . Storage::url($item->main_img) . '" style="max-height:150px;"/>' : '';
                })
                ->rawColumns(['action', 'main_img'])
                ->make();
        }

        return view('pages.admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('pages.admin.article.create', [
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->article_title);

        $data['main_img'] = $request->file('main_img')->store('assets/article_main_img', 'public');

        Article::create($data);

        return redirect()->route('article');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Article::findOrFail($id);
        // $item = Article::where('slug', $id)->firstOrFail();

        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('pages.admin.article.edit', [
            'item' => $item,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        $data = $request->all();

        // $data['slug'] = Str::slug($request->nama_kategori);
        $item = Article::findOrFail($id);

        // $data['slug'] = Str::slug($request->judul);
        if ($item->judul !== $request->judul) {
            $data['slug'] = Str::slug($request->judul);
        }
        if ($request->hasFile('main_img')) {
            $data['main_img'] = $request->file('main_img')->store('assets/article_main_img', 'public');
        }
        $item->update($data);

        return redirect()->route('article')->with('success', 'Artikel berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Article::findOrFail($id);

        $item->delete();
        return redirect()->route('article');
    }
}
