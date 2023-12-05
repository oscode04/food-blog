@extends('layouts.main-layout')

@section('tittle')
Food Blog - Edukasi
@endsection

@section('content')
<div class="container">
  <div class="mt-lg-3 mb-lg-3 mt-3 mb-3 title">
    <h2 class="text-lg-center text-center">Edukasi</h2>
    <h5 class="ms-2 text-lg-center text-center ms-lg-0">Video Edukasi</h5>
  </div>

  <div class="row d-flex justify-content-center">
    <!-- video container -->
    @forelse ($videos as $video)
      @if ($article->id_sub_categories === 2)
      <div class="col-lg-4 video-wt">
        <div class="icon d-flex justify-content-center">
          <span class="material-symbols-rounded"> play_arrow </span>
        </div>
        <a href="{{ $video->link }}">
          <img src="{{ $video->link_thumbnail }}" alt="" />
        </a>
        <div class="card-body mt-lg-2">
          <h5 class="card-title"> {{ $video->article_title }}</h5>
          <p class="card-text">
            {{ Str::limit(strip_tags($video->article_contens), 100) }}
          </p>
        </div>
      </div>
      @endif
    @empty
    <div class="col-lg-4 video-wt">
      <h5 class="text-center">Belum Ada Video di Publish</h5>
    </div>
    @endforelse
    <!-- end video container -->
  </div>
  <!-- artikel -->
  <div>
    <h5 class="mt-lg-4 mb-lg-3 artikel">Artikel Edukasi</h5>
    <div style="margin-bottom: 95px">
      @forelse ($articles as $article)
        @if ($article->id_sub_categories === 2)
        <a href="{{route('artikel-details',$article->slug)}}">
          <div class="row mb-3 g-0">
            <div class="col-lg-2 col-6 pe-0 artikel-container">
              <img
                class="img-artikel-size"
                src="{{Storage::url($article->main_img)}}"
                alt=""
              />
            </div>

            <div class="col-lg-4 col-6">
              <h4 class="artikel-tittle ms-1 ms-lg-0">
                {{ $article->article_title }}
              </h4>
              <div class="text-artikel-container">
                <p class="long-text ms-1 ms-lg-0">
                  {{ Str::limit(strip_tags($article->article_contens), 100) }}
                </p>
              </div>
            </div>
          </div>
        </a>
        @else
        <div class="col-lg-4 video-wt">
          <h5 style="margin-bottom: 118px">Belum Ada Artikel di Publish</h5>
        </div>
        @endif
      @empty
      
      @endforelse
    </div>
  </div>
</div>
@endsection