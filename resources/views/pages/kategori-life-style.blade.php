@extends('layouts.main-layout')

@section('tittle')
Food Blog - Life Style
@endsection

@section('content')
@php
$articlesWithSubCategoryThree = $articles->where('id_sub_categories', 4);
$videosWithSubCategoryThree = $videos->where('id_sub_categories', 4);
@endphp
<div class="container">
  <div class="mt-lg-3 mb-lg-3 mt-3 mb-3 title">
    <h2 class="text-lg-center text-center">Life Style</h2>
    <h5 class="ms-2 text-lg-center text-center ms-lg-0">Video Life Style</h5>
  </div>

  <div class="row d-flex justify-content-center">
    <!-- video container -->
    @if ($videosWithSubCategoryThree->isNotEmpty())
        @foreach ($videosWithSubCategoryThree as $video)
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
        @endforeach
    @else
        <div class="col-lg-4 video-wt">
            <h5 class="text-center" style="margin-bottom: 118px">Belum Ada Video di Publish</h5>
        </div>
    @endif
    <!-- end video container -->
  </div>
  <!-- artikel -->
  <div>
    <h5 class="mt-lg-4 mb-lg-3 artikel">Artikel Life Style</h5>
    <div style="margin-bottom: 95px">
      @if ($articlesWithSubCategoryThree->isNotEmpty())
          @foreach ($articlesWithSubCategoryThree as $article)
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
          @endforeach
      @else
          <div class="col-lg-4 video-wt">
              <h5 style="margin-bottom: 118px">Belum Ada Artikel di Publish</h5>
          </div>
      @endif
    </div>
  </div>
</div>
@endsection