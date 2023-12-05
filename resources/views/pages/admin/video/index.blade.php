@extends('layouts.admin-layout')

@section('title')
    Video Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Video</h2>
            <p class="dashboard-subtitle">
                Daftar Video
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('video.create')}}" class="btn btn-primary mb-3">
                                + Tambah Video Baru
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Nama Video</th>
                                        <th>Link</th>
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
                    { data: 'video_title', name: 'video_title' },
                    { data: 'link', name: 'link' },
                    { data: 'sub_category.name_sub_categories', name: 'sub_category.name_sub_categories' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    },
                ]
            });

            
    </script>
@endpush