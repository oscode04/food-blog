<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\DocumentationRequest;

use Yajra\DataTables\Facades\DataTables;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Documentation::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form action = "' . route('documentation.destroy', $item->id) . '" method="POST">
                        ' . method_field('DELETE') . csrf_field() . '
                            <button type="submit" type="button" class="btn btn-danger" >
                                Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('photos', function ($item) {
                    return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height:150px;"/>' : '';
                })
                ->rawColumns(['action', 'photos'])
                ->make();
        }

        return view('pages.admin.documentation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.documentation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentationRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/documentation', 'public');

        Documentation::create($data);

        return redirect()->route('documentation');
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
        // $item = Video::findOrFail($id);

        // return view('pages.admin.video.edit', [
        //     'item' => $item
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentationRequest $request, string $id)
    {
        // $data = $request->all();

        // // $data['slug'] = Str::slug($request->nama_kategori);
        // $item = Video::findOrFail($id);

        // $item->update($data);

        // return redirect()->route('video');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Documentation::findOrFail($id);

        $item->delete();
        return redirect()->route('documentation');
    }
}
