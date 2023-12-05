<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SubCategoryRequest;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class SubCatgoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = SubCategory::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <ul class="dropdown-menu" action' .  $item->id . '">
                                <li>
                                    <a class="dropdown-item" href="' . route('sub-category.edit', $item->id) . '">Edit</a>
                                </li>
                                <li>
                                    <form action = "' . route('sub-category.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ini untuk tampilannya, dia ambil file dari create.blade.php
        return view('pages.admin.sub-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        $data = $request->all();

        // nama_kategori field dari db
        $data['slug'] = Str::slug($request->name_sub_categories);

        SubCategory::create($data);

        return redirect()->route('sub-category');
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
        $item = SubCategory::findOrFail($id);

        return view('pages.admin.sub-category.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_kategori);
        $item = SubCategory::findOrFail($id);

        $item->update($data);

        return redirect()->route('sub-category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = SubCategory::findOrFail($id);

        $item->delete();
        return redirect()->route('sub-category');
    }
}
