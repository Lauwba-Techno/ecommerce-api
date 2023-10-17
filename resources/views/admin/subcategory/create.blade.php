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
            <h1 class="h3 mb-0 text-gray-800">Sub Kategori</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Sub Kategori</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/subcategory-store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-muted" id="subcategory_name"
                            name="subcategory_name" value="{{ old('subcategory_name') }}" placeholder="Nama Category">
                    </div>
                    <div class="form-group">
                        <select class="form-control text-muted" id="category_id" name="category_id">
                            <option value="#">Pilih Kategory</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->category_id }}" @selected(old('category_id') == $item->category_id)>
                                    {{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="subcategory_image" name="subcategory_image" type="file">
                    </div>
                    <div class="form-group">
                        <Textarea class="form-control text-muted text-xs" id="subcategory_desc" name="subcategory_desc" rows="5"
                            placeholder="Deskripsi Category">{{ old('subcategory_desc') }}</Textarea>
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
