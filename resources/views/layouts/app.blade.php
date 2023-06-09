<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <title>
        {{ $title ?? config('app.name') }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('library/http_cdn.jsdelivr.net_npm_bootstrap-icons@1.10.4_font_bootstrap-icons.css') }}">
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/icons/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/icons/css/fontawesome.css') }}" /> --}}
    <script src="{{ asset('library/http_kit.fontawesome.com_42d5adcbca.js') }}" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{ asset('assets/icons/css/solid.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/icons/css/brands.css') }}" /> --}}
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/admin/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    @stack('custom-styles')
    @stack('print-styles')

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">

        @include('layouts.sidebar')

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Topbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">

            @include('layouts.topbar')

        </nav>
        <!-- End Topbar -->
        <div class="container-fluid py-4">

            {{-- @hasrole('superadmin|admin|valet|pegawai') --}}
            @yield('content')
            {{-- @endhasrole --}}

            {{-- @hasrole('hotel')
                @yield('main')
            @endhasrole --}}

            <footer class="footer pt-3">

                @include('layouts.footer')

            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Settings</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/chartjs.min.js') }}"></script>
    <script>
        // var ctx1 = document.getElementById("chart-line").getContext("2d");
        // var ctx2 = document.getElementById("chart-lines").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
        // var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        // gradientStroke2.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        // gradientStroke2.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        // gradientStroke2.addColorStop(0, 'rgba(94, 114, 228, 0)');

    </script>
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
    <script async defer src="{{ asset('library/http_buttons.github.io_buttons.js') }}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script>

    <!-- JQUERY -->
    <script src="{{ asset('library/http_code.jquery.com_jquery-3.6.4.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('body').on('click', '#profile-modal', function () {
                var item_id = $(this).data('id');
                $.get("{{ route('users.index') }}" + '/' + item_id + '/edit', function (data) {
                    $('#modal-profile').modal('show');
                    setTimeout(function () {
                        $('#name').focus();
                    }, 500);
                    $('.modal-title').html("Edit User");
                    $('#updateProfile').removeAttr('disabled');
                    $('#updateProfile').html("Simpan");
                    $('#item_id').val(data.id);
                    $('#name').val(data.name);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#phone_number').val(data.user_detail.phone_number);
                    $('#address').html(data.user_detail.address);
                })
            });

            $('#updateProfile').click(function(e) {
                e.preventDefault();
                $('#updateProfile').attr('disabled', 'disabled');
                $('#updateProfile').html('Simpan ...');
                var formData = new FormData($('#FormTio')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('users.store') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#FormTio').trigger("reset");
                        $('#modal-profile').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#updateProfile').removeAttr('disabled');
                        $('#updateProfile').html("Simpan");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

        });
    </script>

    @stack('custom-scripts')
</body>

</html>
