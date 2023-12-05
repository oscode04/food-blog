@extends('layouts.admin-layout')

@section('title')
    Category Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Sub Kategori</h2>
            <p class="dashboard-subtitle">
                Daftar Sub Kategori
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <a href="{{route('sub-category.create')}}" class="btn btn-primary mb-3">
                                + Tambah Sub Kategori Baru
                            </a> --}}
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Sub Kategori</th>
                                        <th>Slug</th>
                                        {{-- <th>Aksi</th> --}}
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
                    { data: 'id', name: 'id' },
                    { data: 'name_sub_categories', name: 'name_sub_categories' },
                    { data: 'slug', name: 'slug' },
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false,
                    //     width: '15%'
                    // },
                ]
            });

            
    </script>
@endpush