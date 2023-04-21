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
                <span class="nav-link-text ms-1">Pesanan</span>
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
