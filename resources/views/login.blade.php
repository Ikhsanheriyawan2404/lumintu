<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
  <title>
    Login || Lumintu SIP
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/icons/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/icons/css/solid.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/icons/css/brands.css') }}">
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/admin/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('assets/img/galeri/8.JPG') }}'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
            <p class="text-lead text-white">Masukkan username atau email dan password untuk masuk.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0 shadow-lg border">
            <div class="card-header text-center pt-4">
              <h5>Sign In</h5>
            </div>
            <div class="card-body">
              <form role="form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="email" class="form-control form-control-lg" placeholder="Username / Email" aria-label="Email">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Ingatkan Saya</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" href="/admin">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/admin/js/argon-dashboard.min.js') }}"></script>
</body>

</html>