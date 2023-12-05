<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = Category::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <ul class="dropdown-menu" action' .  $item->id . '">
                                <li>
                                    <a class="dropdown-item" href="' . route('category.edit', $item->id) . '">Edit</a>
                                </li>
                                <li>
                                    <form action = "' . route('category.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ini untuk tampilannya, dia ambil file dari create.blade.php
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        // nama_kategori field dari db
        $data['slug'] = Str::slug($request->name_categories);

        Category::create($data);

        return redirect()->route('category');
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
    public function edit($id)
    {
        $item = Category::findOrFail($id);

        return view('pages.admin.category.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_kategori);
        $item = Category::findOrFail($id);

        $item->update($data);

        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Category::findOrFail($id);

        $item->delete();
        return redirect()->route('category');
    }
}
