@extends('layouts.porto')

@section('content')

    <div class="hero hero-single route bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
        <div class="overlay-mf"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h2 class="hero-title mb-4">Portfolio Details</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ url()->previous() }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Portfolio Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div
                            class="portfolio-details-slider swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                            <div class="swiper-wrapper align-items-center" id="swiper-wrapper-01f2f906b38221e8"
                                aria-live="off"
                                style="transform: translate3d(-1232px, 0px, 0px);">
                                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" role="group"
                                    aria-label="1 / 3" style="width: 616px;">
                                    <img src="{{ asset($data->image_file_url) }}" alt="">
                                </div>
                            </div>
                            <div
                                class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 1"></span><span
                                    class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                    role="button" aria-label="Go to slide 2" aria-current="true"></span><span
                                    class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 3"></span></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Portfolio Details</h3>
                            <ul>
                                <li><strong>Title</strong>: {{ $data->title }}</li>
                                <li><strong>Category</strong>: @if ($data->category_id == 1)
                                    Web Design
                                @elseif ($data->category_id == 2)
                                    App Design
                                @elseif ($data->category_id == 3)
                                    Volunteer
                                @elseif ($data->category_id == 4)
                                    Experience
                                @elseif ($data->category_id == 5)
                                    Organization
                                @else
                                    Other
                                @endif
                                </li>
                                <li><strong>Event date</strong>: {{ $data->portfolio_date }}</li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <p>
                                {{ $data->description }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
