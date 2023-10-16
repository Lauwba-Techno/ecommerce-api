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
            <h1 class="h3 mb-0 text-gray-800">Bantuan</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Bantuan</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/help-update/{{ $help->help_id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user text-muted" id="help_name"
                            name="help_name" value="{{ $help->help_name }}" placeholder="Nama Bantuan">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="help_image" name="help_image" type="file">
                    </div>
                    <div class="form-group">
                        <Textarea class="form-control text-muted text-xs" id="help_desc" name="help_desc" rows="5"
                            placeholder="Deskripsi Bantuan">{{ $help->help_desc }}</Textarea>
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
