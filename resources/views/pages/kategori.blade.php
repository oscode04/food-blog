@extends('layouts.main-layout')

@section('tittle')
    Food Blog - Kategori
@endsection

@section('content')
<div class="container-fluid container-category">
<h1>Kategori</h1>
<div class="d-lg-flex flex-lg-column align-items-lg-center">
    <div class="row r-1 m-auto">
    <div class="col-lg-6 col-md-6 col-12 p-0 c-1">
        <a href="{{ route('food-tech') }}">
        <div class="frame-kategori-1">
            <img src="../aset/icon/food-tech.jpg" alt="food-tech" />
        </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-12 p-0 c-2">
        <a href="{{ route('life-style') }}">
        <div class="frame-kategori-2">
            <img src="../aset/icon/life-style.jpg" alt="life-style" />
        </div>
        </a>
    </div>
    </div>
    <div class="row r-2 m-auto">
    <div class="col-lg-6 col-md-6 col-12 p-0 c-1">
        <a href={{ route('healty-food') }}>
        <div class="frame-kategori-2">
            <img src="../aset/icon/healty-food.jpg" alt="healty-food" />
        </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-12 p-0 c-2 mb-5">
        <a href={{ route('edukasi') }}>
        <div class="frame-kategori-1">
            <img src="../aset/icon/education.jpg" alt="food-inno" />
        </div>
        </a>
    </div>
    </div>
</div>
</div>
@endsection