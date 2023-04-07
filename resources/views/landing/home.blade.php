@extends('landing.layouts.app')

@section('content')
    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">Welcome to Lumintu SIP Website.</h1>
                        <p class="lead fw-normal text-muted mb-5">This is the website of the Lumintu SIP company that
                            provides laundry services.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Masthead device mockup feature-->
                    <div class="masthead-device-mockup">
                        <svg class="circle px-5" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                <div class="screen bg-white">
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <img src="{{ asset('assets/img/logo.png') }}"
                                            style="max-width: 100%; height:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Profile section-->
    <section id="profile">
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">Profile</div>
                        <div class="mb-4">
                            <p class="text-white">CV, Lumintu SIP adalah sebuah perusahaan yang bergerak di bidang jasa
                                pencucian Pakaian, Room Linen, Uniform, Food And Beverage yang telah bergerak pada industri
                                laundry selama 15 Tahun.</p>
                            <a href="" class="btn btn-light">Baca Selengkapnya</a>
                        </div>
                        <img src="{{ 'assets/homepage/img/logo.png' }}" alt="..." style="height: 5rem" />
                    </div>
                </div>
            </div>
        </aside>
    </section>
    <!-- Product section-->
    <section id="product">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                    <div class="mb-4 text-center">
                        <div class="h2 fs-1">Product</div>
                        <span class="text-black-50">Berikut adalah produk layanan jasa yang kami tawarkan.</span>
                    </div>
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Room Linen</h3>
                                    <p class="text-muted mb-0">Ready to use HTML/CSS device mockups, no Photoshop required!
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Food And Beverage</h3>
                                    <p class="text-muted mb-0">Put an image, video, animation, or anything else in the
                                        screen!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Uniform</h3>
                                    <p class="text-muted mb-0">As always, this theme is free to download and use for any
                                        purpose!</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Open Source</h3>
                                    <p class="text-muted mb-0">Since this theme is MIT licensed, you can use it
                                        commercially!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery section-->
    <section id="gallery">
            <div class="container-fluid rounded px-5">
                <div class="mb-4 text-center">
                    <div class="h2 fs-1">Gallery</div>
                    <span class="text-black-50">Berikut adalah galeri dari perusahaan CV. Lumintu SIP.</span>
                </div>
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('assets/img/galeri/1.JPG') }}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/img/galeri/2.JPG') }}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/img/galeri/3.JPG') }}" class="d-block w-100">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
        </div>
    </section>
    <!-- Contact section-->
    <section class="bg-gradient-primary-to-secondary" id="contact">
        <div class="container px-5">
            <h2 class="text-center text-white font-alt mb-4">Contact</h2>
        </div>
    </section>
@endsection