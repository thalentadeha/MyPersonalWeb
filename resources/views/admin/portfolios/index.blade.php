@extends('admin.layouts.editlayout')

@section('title', 'Portfolio')

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
                            <div class="card-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Portfolio Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><img src="{{ asset($item->image_file_url) }}" alt="" width="200"></td>
                                                <td>
                                                    @if ($item->category_id == 1)
                                                    Web Design
                                                @elseif ($item->category_id == 2)
                                                    App Design
                                                @elseif ($item->category_id == 3)
                                                    Volunteer
                                                @elseif ($item->category_id == 4)
                                                    Experience
                                                @elseif ($item->category_id == 5)
                                                    Organization
                                                @else
                                                    Other
                                                @endif
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->portfolio_date }}</td>
                                                <td><a href="{{ route('portfolios.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                Edit </a>
                                                <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                                document.getElementById('delete-portfolio-{{ $item->id }}').submit();">Delete</button>
                                                <form id="delete-portfolio-{{ $item->id }}" action="{{ route('portfolios.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="{{ route('portfolios.create') }}">Add</a>
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
