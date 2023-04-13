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
                        <p class="text">
                            <b>CV. Lumitu SIP</b> didirikan pada tanggal 30 Juli 2007 dengan menawarkan jasa Laundry and Dry
                            Cleaning untuk mengatasi masalah yang ada ditengah-tengah seluruh lapisan masyarakat, salah
                            satunya yakni mahasiswa.
                        </p>
                        <p class="text">
                            Perusahaan ini berdiri dengan Motto <i>“SOLUSI-INOVASI-PRESTASI”</i> motto ini selalu dipegang
                            oleh perusahaan guna menjaga kualitas produksi dan kualitas pelayanan yang telah diterapkan dari
                            awal.
                        </p>
                        <a href="#" class="main-btn page-scroll">Baca Selengkapnya</a>
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
                            <h4 class="services-title"><a href="#">Stock Inventory Management (SIM)</a></h4>
                            <p class="text">Sebuah program kerjasama pemeliharaan semua barang Pelanggan, yang
                                berkesinambungan dengan tujuan utama agar barang pelanggan senantiasa dalam
                                keadaan siap pakai baik siap dalam kualitas maupun siap dalam jumlahnya.</p>
                            <a class="more" href="#">Baca Selengkapnya<i class="lni-chevron-right"></i></a>
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
                            <h4 class="services-title"><a href="#">Intensive Communication Meeting (ICM)</a></h4>
                            <p class="text">Bentuk Pertemuan rutin yang diselenggarakan antara wakil pihak Hotel
                                dan perusahaan Laundry untuk mengkomunikasikan dan mengevaluasi secara Bersama
                                segala hal yang berkaitan hasil pengerjaan laundry maupun permasalahannya sehingga
                                dapat diatasi secara cepat dan memuaskan.</p>
                            <a class="more" href="#">Baca Selengkapnya<i class="lni-chevron-right"></i></a>
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
                            <h4 class="services-title"><a href="#">Proposal Sponsorship</a></h4>
                            <p class="text">Program ini merupakan sebuah program yang telah kami budgetkan untuk
                                berpartisipasi dalam suatu kegiatan maupun penyelenggaraan sebuah event yang
                                diselenggarakan secara resmi oleh pihak hotel dengan prosedur yang transparan dan
                                kuntable.</p>
                            <a class="more" href="#">Baca Selengkapnya <i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PROGRAM ENDS ======-->

    <!--====== GALLERY START ======-->

    <section id="gallery" class="testimonial-area pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Gallery</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
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
                        <img src="{{ asset('assets/landing/images/galeri/1.JPG') }}" class="d-block w-100"
                            style="height: 500px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/landing/images/galeri/2.JPG') }}" class="d-block w-100"
                            style="height: 500px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/landing/images/galeri/3.JPG') }}" class="d-block w-100"
                            style="height: 500px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/landing/images/galeri/4.JPG') }}" class="d-block w-100"
                            style="height: 500px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/landing/images/galeri/5.JPG') }}" class="d-block w-100"
                            style="height: 500px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/landing/images/galeri/6.JPG') }}" class="d-block w-100"
                            style="height: 500px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== GALLERY ENDS ======-->

    <!--====== VIDEO COUNTER PART START ======-->

    <section id="contact" class="video-counter pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="{{ asset('assets/landing/images/dots.svg') }}" alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d588.7327538690962!2d107.76030833629464!3d-6.949470070395819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c3128159e98b%3A0x44285efa37b66967!2sH.%20Hasan%20Simon!5e0!3m2!1sid!2sid!4v1680907835081!5m2!1sid!2sid"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
                <div class="col-lg-6">
                    <div class="counter-wrapper mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Hubungi <span>Kami</span></h3>
                            </div>
                        </div> <!-- counter content -->
                        <div class="row">
                            <form action="" class="col-lg-12 mt-5">
                                <div class="mb-5">
                                    <div class="input-group input-group-lg mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="lni-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama"
                                            id="nama">
                                    </div>
                                    <div class="input-group input-group-lg mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="lni-envelope"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Masukkan Email"
                                            id="email">
                                    </div>
                                    <div class="input-group input-group-lg mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="lni-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Masukkan Nomor Handphone"
                                            id="noHp">
                                    </div>
                                </div>
                                <button type="submit" class="main-btn">Kirim Pesan</button>
                            </form>
                        </div>
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== VIDEO COUNTER PART ENDS ======-->
@endsection
