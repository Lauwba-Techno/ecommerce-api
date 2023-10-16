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
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Produk</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/product-update/{{ $product->product_id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-muted" id="product_name"
                            name="product_name" value="{{ $product->product_name }}" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user text-muted" id="product_stock"
                            name="product_stock" value="{{ $product->product_stock }}" placeholder="Stok Produk">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user text-muted" id="product_price"
                            name="product_price" value="{{ $product->product_price }}" placeholder="Harga Produk">
                    </div>
                     <div class="form-group">
                        <select class="form-control text-muted" id="subcategory_id" name="subcategory_id">
                            <option value="#">Pilih Sub Kategori</option>
                            @foreach ($subcategory as $item)
                                <option value="{{ $item->subcategory_id }}" @selected($item->subcategory_id == $product->subcategory_id)>{{ $item->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="product_image" name="product_image" type="file">
                    </div>
                    <div class="form-group">
                        <Textarea class="form-control text-muted text-xs" id="product_desc" name="product_desc" rows="5"
                            placeholder="Deskripsi Produk">{{ $product->product_desc }}</Textarea>
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
