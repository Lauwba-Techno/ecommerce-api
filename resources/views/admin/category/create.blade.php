@extends('admin.component.main')
@section('content')
    <div class="container-fluid">

        @if (session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errors')->first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Kategori</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/category-store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-muted" id="category_name"
                            name="category_name" value="{{ old('category_name') }}" placeholder="Nama Category">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="category_image" name="category_image" type="file">
                    </div>
                    <div class="form-group">
                        <Textarea class="form-control text-muted text-xs" id="category_desc" name="category_desc" rows="5"
                            placeholder="Deskripsi Category">{{ old('category_desc') }}</Textarea>
                    </div>
                    <hr>
                    <button class="btn btn-facebook btn-user btn-block">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
