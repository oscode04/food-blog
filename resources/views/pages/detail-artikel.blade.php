@extends('layouts.detail-layout')

@section('tittle')
   Artikel Details
@endsection

@section('content')
<div class="container">
  <div class="row mb-lg-4 mt-lg-4 gx-lg-0 align-items-center">
    <div class="col-lg-7 ms-lg-3 ">
      <div class="card card-main-news ms-lg-5">
        <img
        src="{{Storage::url($articles->main_img)}}"
        class="img-fluid mb-3 rounded main-img"
        alt="Gambar Artikel"
      />
      </div>
      
    </div>
    <div class="col-lg-5 judul-detail">
      <h1 class="text-lg-start mb-2">{{ $articles->article_title }}</h2>
      <p class="fw-semibold kategori-detail">
        @if ($articles->subCategory)
            Kategori : {{ $articles->subCategory->name_sub_categories }}
        @else
            Kategori tidak tersedia
        @endif
      </p>  
      <p class="mb-3">Ditulis tanggal {{ $articles->created_at->format('d-m-Y') }} | oleh <b> {{ $articles->writer }} </b></p>
      
      {{-- <div class="d-grid gap-2 mt-2">
        <a href="#" class="btn custom-button"
          >Lihat Publikasi Lainnya</a
        >
      </div> --}}
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="isi-artikel">
      {!! ($articles->article_contens) !!}
    </div>
  </div>
</div>
@endsection
