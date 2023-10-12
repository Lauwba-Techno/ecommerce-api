@extends('admin.component.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cart</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Cart</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <tbody>
                            <tr>
                                <th>Nama Produk</th>
                                <td>{{ $cart->product->product_name }}</td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td><img src="{{ Storage::url($cart->product->product_image) }}" alt="{{ $cart->product->product_image }}" width="100px" height="100px"></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $cart->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>{{ $cart->product->product_price * $cart->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <td>{{ $cart->user->fullname }}</td>
                            </tr>

                       </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
