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
            <h1 class="h3 mb-0 text-gray-800">Feed</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Feed</h6>
            </div>
            <div class="card-body">
                <a href="/feed-create" class="btn btn-primary my-3 float-right">Tambah Data</a>
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
                            @foreach ($feed as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->feed_title }}</td>
                                    <td>{{ $item->feed_category }}</td>
                                    <td>{{ Str::substr($item->feed_desc, 0, 100) }}...</td>
                                    <td><img class="object-fit-cover border rounded" src="{{ Storage::url($item->feed_image) }}" alt="{{ $item->feed_image }}"
                                           width="100px !important" height="100px !important"></td>
                                    <td>
                                        <a href="/feed-edit/{{ $item->feed_id }}" class="btn btn-warning">Edit</a>
                                        <a href="/feed-delete/{{ $item->feed_id }}" class="btn btn-danger">Delete</a>
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
