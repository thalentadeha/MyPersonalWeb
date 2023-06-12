@extends('admin.layouts.editlayout')

@section('title', 'About Me')

@section('content')

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>{{ config('app.name') }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: DevFolio
        * Updated: Mar 10 2023 with Bootstrap v5.2.3
        * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <main id="main">

        @foreach ($aboutme as $index => $item)
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
                                    <li class="breadcrumb-item active">About</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>

                <!-- ======= About Section ======= -->
                <section id="about" class="about-mf sect-pt4 route">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box-shadow-full">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="about-img">
                                                        <img src="{{ asset($item->photo_file_url) }}"
                                                            class="img-fluid rounded b-shadow-a" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-7">
                                                    <div class="about-info">
                                                        <p><span class="title-s">Name: </span>
                                                            <span>{{ $item->my_name }}</span></p>
                                                        <p><span class="title-s">Profile: </span>
                                                            <span>{{ $item->my_profile }}</span></p>
                                                        <p><span class="title-s">Email: </span>
                                                            <span>{{ $item->my_email }}</span></p>
                                                        <p><span class="title-s">Phone: </span>
                                                            <span>{{ $item->my_number }}</span></p>
                                                        <p><a href="{{ route('aboutmes.edit', $item->id) }}"
                                                                class="btn btn-warning">
                                                                Edit </a></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="skill-mf">
                                                <p class="title-s">Skill</p>
                                                @foreach ($skilldata as $index=>$skill)
                                                    <span>{{ $skill->skill_name }}</span> <span
                                                        class="pull-right">{{ $skill->skill_percent }}%</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $skill->skill_percent }}%;"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <a href="{{ route('skills.edit', $skill->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="showDeleteConfirmation('delete-portfolio-{{ $skill->id }}')">Delete</button>
                                                    <form id="delete-portfolio-{{ $skill->id }}"
                                                        action="{{ route('skills.destroy', $skill->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <a class="btn btn-primary" href="{{ route('skills.create') }}">Add</a>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="about-me pt-4 pt-md-0">
                                                <div class="title-box-2">
                                                    <h5 class="title-left">
                                                        About me
                                                    </h5>
                                                </div>
                                                <p class="lead">
                                                    {{ $item->my_description }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- End About Section -->
        @endforeach

    </main><!-- End #main -->

@endsection
