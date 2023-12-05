@extends('layouts.admin-layout')

@section('title')
    Article Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Update Artikel</h2>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('article.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="fw-semibold">Judul</label>
                                            <input type="text" name="article_title" class="form-control" value="{{ $item->article_title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="fw-semibold">Penulis</label>
                                            <input type="text" name="writer" class="form-control" value="{{ $item->writer }}"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="fw-semibold">Upload Gambar Artikel</label> <br>
                                            <input type="file" name="main_img" id="image">
                                        </div>
                                        @if($item->main_img)
                                            <img src="{{ asset('storage/'.$item->main_img) }}" alt="Gambar Artikel" style="max-height:150px;">
                                            <input type="hidden" name="gambar_utama_existing" value="{{asset($item->main_img)}}">
                                        @endif
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="fw-semibold">Kategori Artikel</label>
                                            <select name="id_categories" class="form-control">
                                                {{-- <option value="{{$item->categories_id}}">{{ $item->category->nama_kategori }}</option> --}}
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name_categories }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="fw-semibold">Sub Kategori Artikel</label>
                                            <select name="id_sub_categories" class="form-control">
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name_sub_categories }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label class="fw-semibold">Isi Artikel</label>
                                            <textarea name="article_contens" id="editor">{!! $item->article_contens !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5 mt-3">
                                            Update Artikel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const imageInput = document.getElementById('image');
        const existingImageInput = document.getElementById('gambar_utama_existing');

        imageInput.addEventListener('change', function() {
            if (imageInput.files.length > 0) {
                const existingImagePath = existingImageInput.value;
                if (existingImagePath) {
                    existingImageInput.value = ''; // Hapus path gambar yang sudah ada
                }
            }
        });
    });
</script>

@endpush