@extends('landing.layouts.app')

@section('content')
    <!--====== PROFILE START ======-->

    <section id="profile" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Tentang <span>Kami</span></h3>
                        </div> <!-- section title -->
                        <p class="text-justify">
                            <b>CV. Lumitu SIP</b> didirikan pada tanggal 30 Juli 2007 dengan menawarkan jasa Laundry and Dry
                            Cleaning untuk mengatasi masalah yang ada ditengah-tengah seluruh lapisan masyarakat, salah
                            satunya yakni mahasiswa.
                        </p>
                        <p class="text-justify">
                            Perusahaan ini berdiri dengan Motto <i>“SOLUSI-INOVASI-PRESTASI”</i> motto ini selalu dipegang
                            oleh perusahaan guna menjaga kualitas produksi dan kualitas pelayanan yang telah diterapkan dari
                            awal.
                        </p>
                        <a href="/profile" class="main-btn page-scroll">Baca Selengkapnya</a>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="{{ asset('assets/landing/images/about-shape-1.svg') }}" alt="shape">
        </div>
    </section>

    <!--====== PROFILE ENDS ======-->

    <!--====== PROGRAM START ======-->

    <section id="program" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Program <span>Advisory atau After Sales Service</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/services-shape.svg') }}"
                                alt="shape">
                            <img class="shape-1" src="{{ asset('assets/landing/images/services-shape-1.svg') }}"
                                alt="shape">
                            <i class="lni-package"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="/program">Stock Inventory Management (SIM)</a></h4>
                            <p class="text">Sebuah program kerjasama pemeliharaan semua barang Pelanggan, yang
                                berkesinambungan dengan tujuan utama agar barang pelanggan senantiasa dalam
                                keadaan siap pakai baik siap dalam kualitas maupun siap dalam jumlahnya.</p>
                            <a class="more" href="/program">Baca Selengkapnya<i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/services-shape.svg') }}"
                                alt="shape">
                            <img class="shape-1" src="{{ asset('assets/landing/images/services-shape-2.svg') }}"
                                alt="shape">
                            <i class="lni-comment-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="/program">Intensive Communication Meeting (ICM)</a></h4>
                            <p class="text">Bentuk Pertemuan rutin yang diselenggarakan antara wakil pihak Hotel
                                dan perusahaan Laundry untuk mengkomunikasikan dan mengevaluasi secara Bersama
                                segala hal yang berkaitan hasil pengerjaan laundry maupun permasalahannya sehingga
                                dapat diatasi secara cepat dan memuaskan.</p>
                            <a class="more" href="/program">Baca Selengkapnya<i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/services-shape.svg') }}"
                                alt="shape">
                            <img class="shape-1" src="{{ asset('assets/landing/images/services-shape-3.svg') }}"
                                alt="shape">
                            <i class="lni-certificate"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="/program">Proposal Sponsorship</a></h4>
                            <p class="text">Program ini merupakan sebuah program yang telah kami budgetkan untuk
                                berpartisipasi dalam suatu kegiatan maupun penyelenggaraan sebuah event yang
                                diselenggarakan secara resmi oleh pihak hotel dengan prosedur yang transparan dan
                                kuntable.</p>
                            <a class="more" href="/program">Baca Selengkapnya <i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PROGRAM ENDS ======-->

    <!--====== GALLERY START ======-->

    <section id="gallery" class="video-counter pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Galeri <span>Perusahaan</span></h3>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="video-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="video-wrapper shadow-lg">
                            <div class="video-image shadow-lg">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/landing/images/galeri/1.JPG') }}"
                                                class="d-block w-100 img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/landing/images/galeri/2.JPG') }}"
                                                class="d-block w-100 img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/landing/images/galeri/3.JPG') }}"
                                                class="d-block w-100 img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/landing/images/galeri/4.JPG') }}"
                                                class="d-block w-100 img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/landing/images/galeri/5.JPG') }}"
                                                class="d-block w-100 img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/landing/images/galeri/6.JPG') }}"
                                                class="d-block w-100 img-fluid">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== GALLERY ENDS ======-->

    <!--====== PELANGGAN START ======-->

    <section id="pelanggan" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title"><span>Pengalaman</span> Pelanggan</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/yellow-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Yellow Bee Tangerang</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/urban-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Urban Express Hotel Serpong</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/starlet-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Starlet Hotel Jakarta Airport</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/santika-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Santika ICE BSD</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/samala-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Samala Hotel Cengkareng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/redplanet-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Red Planet Jakarta Pasar Baru</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/pakons-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Pakons Prime Hotel Tangerang</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/kyriad-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Kyriad Airport Hotel Jakarta</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape"
                                src="{{ asset('assets/landing/images/pelanggan/holidayinn-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Holiday Inn Suit Gajah Mada</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/grantage-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Grantage Hotel Serpong</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape"
                                src="{{ asset('assets/landing/images/pelanggan/goldentulip-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Golden Tulip Essential</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/fave-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Fave Hotel Zainul Arifin</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/asana-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Asana Sincerity Dorm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/amaris-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Amaris Hotel Thamrin City</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/amaris2-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Amaris Hotel Mangga Besar</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/amaris4-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Amaris Hotel Pasar Baru</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/amaris3-hotel.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Amaris Hotel Juanda</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape"
                                src="{{ asset('assets/landing/images/pelanggan/mediterania-apart.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Apartment Mediterania Garden Residence 2</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mt-20 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/landing/images/pelanggan/greenbay-apart.png') }}">
                        </div>
                        <div class="services-content mt-10">
                            <p class="text" style="font-size: 14px">Apartment Green Bay Pluit</p>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PELANGGAN ENDS ======-->

    <!--====== MAPS START ======-->

    <section id="maps" class="video-counter pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title"><span>Cari Kami di</span>Maps</h3>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="video-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="{{ asset('assets/landing/images/dots.svg') }}" alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4048468922656!2d106.61427981744384!3d-6.341581200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3bef173ff59%3A0xca665add5cfdccec!2sLumintu!5e0!3m2!1sid!2sid!4v1682000047255!5m2!1sid!2sid"
                                    width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== MAPS ENDS ======-->
@endsection
