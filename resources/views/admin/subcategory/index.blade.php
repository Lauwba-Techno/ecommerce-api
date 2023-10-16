@extends('admin.component.main')
@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sub Kategori</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Sub Kategori</h6>
            </div>
            <div class="card-body">
                <a href="/subcategory-create" class="btn btn-primary my-3 float-right">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategory as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->subcategory_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ Str::substr($item->subcategory_desc, 0, 100) }}...</td>
                                    <td><img src="{{ Storage::url($item->subcategory_image) }}"
                                            alt="{{ $item->subcategory_image }}" width="100px" height="100px"></td>
                                    <td>
                                        <a href="/subcategory-edit/{{ $item->subcategory_id }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="/subcategory-delete/{{ $item->subcategory_id }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
