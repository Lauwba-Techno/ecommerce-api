@extends('admin.component.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Feed</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Feed</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/carousel-store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" id="carousel_image" name="carousel_image" type="file">
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
