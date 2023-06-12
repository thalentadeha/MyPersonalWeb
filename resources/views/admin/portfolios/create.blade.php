@extends('admin.layouts.editlayout')

@section('title', 'Add Portfolio')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Porfolios</li>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add new portfolio</h3>
                                </div>

                                <form method="post" action="{{ route('portfolios.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title"
                                                name="title">

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description"
                                                name="description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            @foreach ($data as $index => $item)
                                            <input type="radio" class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" value="{{ $item->id }}">{{ $item->name }}
                                            @endforeach
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Portfolio Date</label>
                                            <input type="date" class="form-control @error('portfolio_date') is-invalid @enderror" name="portfolio_date">
                                            @error('portfolio_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Image input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image_file_url') is-invalid @enderror" name="image_file">
                                                    <label class="custom-file-label">Choose
                                                        image</label>
                                                </div>
                                            </div>
                                            @error('image_file_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>error</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
