@extends('layouts.admin-layout')

@section('title')
    Food Blog Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            {{-- <p class="dashboard-subtitle">
                This is Administrator Panel
            </p> --}}
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Jumlah Artikel Publish
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{-- {{ $jumlahArtikel }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Jumlah Video
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{ $jumlahVideo }}
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Jumlah Video Publish
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{-- {{ $jumlahVid }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection