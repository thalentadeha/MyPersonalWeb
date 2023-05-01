@extends('admin.layouts.editlayout')

@section('title', 'Edit About Me')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">About Me</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">About Me</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Edit About Me</h3>
                                </div>

                                <form method="post" action="{{ route('aboutmes.update', $data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control @error('my_name') is-invalid @enderror" placeholder="Enter my_name"
                                                name="my_name" value="{{ $data->my_name }}">

                                                @error('my_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Profile</label>
                                            <input type="text" class="form-control @error('my_profile') is-invalid @enderror" placeholder="Enter my_profile"
                                                name="my_profile" value="{{ $data->my_profile }}">

                                                @error('my_profile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control @error('my_email') is-invalid @enderror" placeholder="Enter my_email"
                                                name="my_email" value="{{ $data->my_email }}">

                                                @error('my_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control @error('my_number') is-invalid @enderror" placeholder="Enter my_number"
                                                name="my_number" value="{{ $data->my_number }}">

                                                @error('my_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control @error('my_description') is-invalid @enderror" placeholder="Enter my_description"
                                                name="my_description" value="{{ $data->my_description }}">
                                            @error('my_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Photo input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('photo_file_url') is-invalid @enderror" name="photo_file">
                                                <label class="custom-file-label">Choose
                                                    Photo</label>
                                            </div>
                                        </div>
                                        @error('photo_file_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>error</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
