<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
       id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('assets/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            </div>
            <div class="col-9 text-truncate">
                <span class="font-weight-bold">{{ auth()->user()->name }}</span><br>
                <span class="font-weight-bold">{{ auth()->user()->email }}</span>
            </div>
        </div>
    </a>
</div>
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse w-auto h-75" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        @hasrole('superadmin|admin|pegawai')
        <li class="nav-item">
            <a class="nav-link {{ Route::is('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-app text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Barang</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('cost.index') ? 'active' : '' }}" href="{{ route('cost.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pengeluaran</span>
            </a>
        </li>
        @endhasrole
        <li class="nav-item">
            <a class="nav-link {{ Route::is('orders.*') ? 'active' : '' }}" href="{{ route('orders.index', []) }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-cart text-success text-sm opacity-10"></i>
                </div>
                @role('owner')
                <span class="nav-link-text ms-1">Laporan Pesanan</span>
                @else
                    <span class="nav-link-text ms-1">Pesanan</span>
                    @endrole
            </a>
        </li>
        @hasrole('superadmin|admin|pegawai')
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Master Setting</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('categories.index') ? 'active' : '' }}"
               href="{{ route('categories.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Kategori</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('mastercost.*') ? 'active' : '' }}"
               href="{{ route('mastercost.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-settings text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pengeluaran</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Setting</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('hotel.index') ? 'active' : '' }}" href="{{ route('hotel.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-building text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Hotel</span>
            </a>
        </li>
        @endhasrole
        @hasrole('superadmin|admin')
        <li class="nav-item">
            <a class="nav-link {{ Route::is('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <div
                    class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-users text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Users</span>
            </a>
        </li>
        @endhasrole
        {{--        @hasrole('owner')--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link {{ Route::is('users.index') ? 'active' : '' }}" href="#">--}}
        {{--                <div--}}
        {{--                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
        {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">--}}
        {{--                        <path--}}
        {{--                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />--}}
        {{--                    </svg>--}}
        {{--                </div>--}}
        {{--                <span class="nav-link-text ms-1">Laporan</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        @endhasrole--}}
    </ul>
</div>
{{-- <hr class="horizontal dark mt-0">
<div class="sidenav-footer mx-3">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm mb-0 w-100 mt-auto">
            <i class="bi bi-box-arrow-left"></i>
            Logout
        </button>
    </form>
</div> --}}
