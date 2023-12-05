<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VideoRequest;
use App\Models\SubCategory;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Video::with(['subCategory']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <ul class="dropdown-menu" action' .  $item->id . '">
                                <li>
                                    <a class="dropdown-item" href="' . route('video.edit', $item->id) . '">Edit</a>
                                </li>
                                <li>
                                    <form action = "' . route('video.destroy', $item->id) . '" method="POST">
                                        ' . method_field('DELETE') . csrf_field() . '
                                        <button type="submit" class="dopdown-item text-danger ms-2"  style="background-color: transparent; border: none;">
                                            Hapus
                                        </button>
                                    </form>
                                </li>
                                </ul>
                            </div>';
                })
                ->make();
        }

        return view('pages.admin.video.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subCategories = SubCategory::all();

        return view('pages.admin.video.create', [
            'subCategories' => $subCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $data = $request->all();

        $query = parse_url($data['link'] = $request->link, PHP_URL_QUERY);
        parse_str($query, $queryParams);


        $videoId = $queryParams['v'];


        // nama_kategori field dari db
        // $data['slug'] = Str::slug($request->nama_kategori);
        $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"; // Ganti sesuai kebutuhan
        $data['link_thumbnail'] = $thumbnailUrl;

        Video::create($data);

        return redirect()->route('video');
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
        $item = Video::findOrFail($id);
        $subCategories = SubCategory::all();

        return view('pages.admin.video.edit', [
            'item' => $item,
            'sub_categories' => $subCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, string $id)
    {
        $data = $request->all();

        // $data['slug'] = Str::slug($request->nama_kategori);
        $item = Video::findOrFail($id);

        $item->update($data);

        return redirect()->route('video');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Video::findOrFail($id);

        $item->delete();
        return redirect()->route('video');
    }
}
