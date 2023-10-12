@extends('admin.component.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <h1>{{ $about->app_name }}</h1>
                        </h6>
                    </div>
                    <div class="card-body">
                        <p>{{ $about->app_desc }}</p>
                        <div class="font-weight-bold">
                            Contact : {{ $about->contact }} (Wa only)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-12 mb-4">
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" action="/about/{{ $about->about_id }}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-xs text-muted" id="app_name" name="app_name" value="{{ $about->app_name }}"
                                    placeholder="Nama Aplikasi">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-xs text-muted" id="contact" name="contact" value="{{ $about->contact }}"
                                    placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <Textarea class="form-control text-xs text-muted" id="app_desc" name="app_desc" rows="5"
                                    placeholder="Deskripsi Aplikasi">{{ $about->app_desc }}</Textarea>
                            </div>
                            <hr>
                            <button class="btn btn-facebook btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
