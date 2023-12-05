@extends('layouts.admin-layout')

@section('title')
    Article Dashboard
@endsection

@section('content')
<!-- Section Content -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Artikel</h2>
            <p class="dashboard-subtitle">
                Daftar Artikel
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('article.create')}}" class="btn btn-primary mb-3">
                                + Tambah Artikel Baru
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        {{-- <th>Nomor</th> --}}
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Sub Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('addon-script')
    <script>
        // AJAX DataTablenn

        $('#crudTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    // { data: 'id', name: 'id' },
                    { data: 'article_title', name: 'article_title' },
                    { data: 'writer', name: 'writer' },
                    { data: 'main_img', name: 'main_img' },
                    { data: 'category.name_categories', name: 'category.name_categories' },
                    { data: 'sub_category.name_sub_categories', name: 'sub_category.name_sub_categories' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '10%'
                    },
                ]
            });

            
    </script>
@endpush