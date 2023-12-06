@extends('layouts.main-layout')

@section('tittle')
    Food Blog
@endsection

@section('content')
{{-- desktop vers --}}
<div class="container-fluid g-lg-0">
    <section class="section1 d-none d-sm-block">
      <div class="row g-0">
        <!-- Berita Utama -->
        <div class="col-lg-6 d-flex justify-content-lg-start">
          <div class="img-news">
            @forelse ($main_articles as $main_article)
              <a href="{{route('artikel-details',$main_article->slug)}}">
                <div class="card card-main-news">
                  <img src="{{Storage::url($main_article->main_img)}}" class="main-img" />
                  <div class="card-body">
                    @forelse ($sub_categories as $sub_category)
                      @if ($sub_category->id === $main_article->id_sub_categories)
                        <p>{{$sub_category->name_sub_categories  }}</p>  
                        
                      @endif
                    @empty
                        
                    @endforelse
                    <h5 class="card-title">
                      {{ $main_article->article_title  }}
                    </h5>
                    <p class="card-text">
                      {{ Str::limit(strip_tags($main_article->article_contens), 150) }}
                    </p>
                  </div>
                </div>
              </a>
            @empty
              <div class="row mb-3 g-0">
                <div class="col-lg-4 col-6 ms-lg-3 ms-3">
                  <h4 class="artikel-tittle">Belum Ada Artikel</h4>
                </div>
              </div>
            @endforelse
            
          </div>
        </div>
        <!-- end Berita Utama -->
        <!-- Artikel Populer -->
        <div class="col-lg-6 d-flex justify-content-end">
          <div class="frame">
            <h3>Artikel Populer</h3>
            @forelse ($hot_articles as $hot_article)
                <a href="{{route('artikel-details',$hot_article->slug)}}">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="img-thumb-populer">
                        <img src="{{Storage::url($hot_article->main_img)}}" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <h4 class="title-artikel-populer">
                        {{ $hot_article->article_title  }}
                      </h4>
                      <p class="isi-artikel-populer">
                      {{Str::limit(strip_tags($hot_article->article_contens), 50)}}
                      </p>
                    </div>
                  </div>
                </a>
            @empty
            <div class="row">
              <div class="col-lg-4 col-6 ">
                <h4 class="artikel-tittle">Belum Ada Artikel</h4>
              </div>
            </div>
            @endforelse            
          </div>
        </div>
        <!-- end Artikel Populer -->
      </div>
    </section>
    <section class="section2 container mb-5 d-none d-sm-block">
      <h1>Artikel Terbaru</h1>
      <div class="line-artikel"></div>
      @forelse ($articles as $article)
          <a href="{{route('artikel-details',$article->slug)}}">
            <div class="row mb-lg-4">
              <div class="col-lg-2">
                <div class="frame-artikel">
                  <img src="{{Storage::url($article->main_img)}}" alt="" />
                </div>
              </div>
              <div class="isi-artikel col-lg-6">
                <h3>{{ $article->article_title }}</h3>
                <p>
                  {{ Str::limit(strip_tags($article->article_contens), 100) }}
                </p>
              </div>
            </div>
          </a>
      @empty
        <div class="row mb-3 g-0">
          <div class="col-lg-4 col-6 ms-lg-3 ms-3">
            <h4 class="artikel-tittle">Belum Ada Artikel</h4>
          </div>
        </div>
      @endforelse
      <a href="{{ route('kategori') }}">
        <button class="btn btn-artikel-lain">Artikel Lain</button>
      </a>
    </section>
</div>
{{-- end desktop vers --}}

{{-- Mobile Vers --}}
<section class="section1 d-block d-sm-none">
    <!-- berita utama -->
    <div class="img-news d-flex justify-content-center">
      @forelse ($main_articles as $main_article)
        <a href="{{route('artikel-details',$article->slug)}}">
          <div class="card card-main-news">
            <img src="{{Storage::url($main_article->main_img)}}" class="main-img" />
            <div class="card-body">
              @forelse ($sub_categories as $sub_category)
                @if ($sub_category->id === $main_article->id_sub_categories)
                  <p>{{$sub_category->name_sub_categories  }}</p>  
                @endif
              @empty
                  
              @endforelse
              <h5 class="card-title">
               {{ $main_article->article_title }}
              </h5>
              <p class="card-text">
                {{ Str::limit(strip_tags($main_article->article_contens), 100) }}
              </p>
            </div>
          </div>
        </a>
      @empty
          
      @endforelse
    </div>
    <!-- end berita utama -->
    <!-- hot artikel -->
    <div class="hot-artikel container pe-0 overflow-hidden">
      <h1>Hot Artikel</h1>
      <div class="line-artikel"></div>
      @forelse ($hot_articles as $hot_article)
      <a href="{{route('artikel-details',$hot_article->slug)}}">
        <div class="row">
          <div class="col-5 pe-0">
            <div class="frame-img-hot">
              <img src="{{Storage::url($hot_article->main_img)}}" alt="gmbr-artikel" />
            </div>
          </div>
          <div class="col-6 isi-hot-artikel">
            <h3>{{ $hot_article->article_title  }}</h3>
            <p>
              {{Str::limit(strip_tags($hot_article->article_contens), 150)}}
            </p>
          </div>
        </div>
      </a>
      @empty
          
      @endforelse
     
      <!-- button artikel lain -->
      <a href="{{ route('kategori') }}">
        <button class="btn btn-artikel-lain">Artikel Lain</button>
      </a>
      <!-- footer -->
    </div>
    
    <!-- end hot artikel -->
  </section>
{{-- End Mobile Vers --}}
@endsection