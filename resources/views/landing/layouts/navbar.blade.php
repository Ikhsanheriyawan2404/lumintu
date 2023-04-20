<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/img/logo2.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                    <ul id="nav" class="navbar-nav ml-auto align-items-sm-center">
                        <li class="nav-item active">
                            <a class="page-scroll" href="#home">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="#profile">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="#program">Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="#gallery">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="#maps">Maps</a>
                        </li>
                        <li class="nav-item main-btn mr-sm-auto">
                            <a class="page-scroll" data-scroll-nav="0" href="{{ route('login') }}"><i
                                    class="bi bi-person-fill"></i> Login</a>
                        </li>
                    </ul>
                    {{-- <div class="navbar-btn d-block d-sm-inline-block navbar-nav" id="nav">
                        <a class="main-btn page-scroll" data-scroll-nav="0" href="{{ route('login') }}">Login</a>
                    </div> --}}
                </div> <!-- navbar collapse -->
            </nav> <!-- navbar -->
        </div>
    </div> <!-- row -->
</div>
