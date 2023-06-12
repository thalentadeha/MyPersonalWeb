@extends('layouts.porto')

@section('content')
    <!-- ======= Hero Section ======= -->
    <div id="hero" class="hero route bg-image" style="background-image: url({{ asset('assets/img/Background.jpg') }})">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    <h1 class="hero-title mb-4">I am Allen</h1>
                    <p class="hero-subtitle"><span class="typed"
                            data-typed-items="Web Developer, Designer, IT Support"></span></p>
                    {{-- <h1 class="hero-subtitle">Follow My Social Media</h1> --}}
                    <p>
                        <span><a href="https://www.instagram.com/thalenta_deha/" target="_blank"><img
                                    src="{{ asset('assets/img/logo_ig.png') }}" width="32 px" height="32 px"
                                    alt=""></a></span>
                        <span><a href="https://twitter.com/Thalenta_Deha" target="_blank"><img
                                    src="{{ asset('assets/img/logo_twt.png') }}" width="32 px" height="32 px"
                                    alt=""></a></span>
                        <span><a href="https://www.linkedin.com/in/thalenta-deha/" target="_blank"><img
                                    src="{{ asset('assets/img/logo_in.png') }}" width="32 px" height="32 px"
                                    alt=""></a></span>
                    </p>
                    <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
                </div>
            </div>
        </div>
    </div><!-- End Hero Section -->

    <main id="main">

        @foreach ($AboutMe as $index => $item)
            <!-- ======= About Section ======= -->
            <section id="about" class="about-mf sect-pt4 route">
                <div class="container">
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
                                                    <p><span class="title-s">Name: </span> <span>{{ $item->my_name }}</span>
                                                    </p>
                                                    <p><span class="title-s">Profile: </span>
                                                        <span>{{ $item->my_profile }}</span>
                                                    </p>
                                                    <p><span class="title-s">Email: </span>
                                                        <span>{{ $item->my_email }}</span>
                                                    </p>
                                                    <p><span class="title-s">Phone: </span>
                                                        <span>{{ $item->my_number }}</span>
                                                    </p>
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
                                            @endforeach
                                        </div>
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

        <!-- ======= Portfolio Section ======= -->
        <section id="work" class="portfolio-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Portfolio
                            </h3>
                            <p class="subtitle-a">
                                This is my portfolio.
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                      <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                      </ul>
                    </div>
                  </div> --}}
                <div class="row">
                    @foreach ($PortfolioList as $index => $item)
                        <div class="col-md-4">
                            <div class="work-box">
                                <a href="{{ asset($item->image_file_url) }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox">
                                    <div class="work-img">
                                        <img src="{{ asset($item->image_file_url) }}" alt="" class="img-fluid">
                                    </div>
                                </a>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2 class="w-title">{{ $item->title }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">
                                                    {{ $item->categories->name }}
                                                </span> / <span class="w-date">{{ $item->portfolio_date }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="w-like">
                                                <a href="{{ route('portofolio.show', $item->id) }}"><span
                                                        class="bi bi-plus-circle"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
            style="background-image: url({{ asset('assets/img/Background.jpg') }})">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf">
                            <div id="contact" class="box-shadow-full">
                                <div class="row">
                                    <div class="col">
                                        <div class="title-box-2 pt-4 pt-md-0">
                                            <h5 class="title-left">
                                                Contact
                                            </h5>
                                        </div>
                                        <div class="more-info">
                                            <p class="lead">
                                                If you need to reach me, there are several ways you can get in touch. Feel
                                                free to contact me using any of the options below. You can reach me by
                                                phone, email, or social media. If you prefer to call me, my phone number is
                                                listed below. If you prefer to email me, you can use the email address
                                                provided. I'm also active on several social media platforms, so you can
                                                reach out to me there as well. Whatever method you choose, don't hesitate to
                                                get in touch if you have any questions or concerns.
                                            </p>
                                            <ul class="list-ico">
                                                {{-- <li><span class="bi bi-geo-alt"></span> 329 WASHINGTON ST BOSTON, MA 02108</li> --}}
                                                @foreach ($AboutMe as $index => $item)
                                                    <li><span class="bi bi-phone"></span> {{ $item->my_number }}</li>
                                                    <li><span class="bi bi-envelope"></span> {{ $item->my_email }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="socials">
                                            <ul>
                                                <li><a href="https://www.instagram.com/thalenta_deha/"
                                                        target="blank"><span class="ico-circle"><i
                                                                class="bi bi-instagram"></i></span></a></li>
                                                <li><a href="https://twitter.com/Thalenta_Deha" target="blank"><span
                                                            class="ico-circle"><i class="bi bi-twitter"></i></span></a>
                                                </li>
                                                <li><a href="https://www.linkedin.com/in/thalenta-deha/"
                                                        target="blank"><span class="ico-circle"><i
                                                                class="bi bi-linkedin"></i></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
