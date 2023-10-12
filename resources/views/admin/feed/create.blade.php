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
                <form class="user" action="/feed-store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-muted" id="feed_title"
                            name="feed_title" placeholder="Nama Feed">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-muted" id="feed_category"
                            name="feed_category" placeholder="Kategori Feed">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="feed_image" name="feed_image" type="file">
                    </div>
                    <div class="form-group">
                        <Textarea class="form-control text-muted" id="feed_desc" name="feed_desc" rows="5"
                            placeholder="Deskripsi Feed"></Textarea>
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