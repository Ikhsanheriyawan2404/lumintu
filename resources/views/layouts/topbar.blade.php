<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-3">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title ?? config('app.name') }}
            </li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">{{ $title ?? config('app.name') }}</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item dropdown px-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bell cursor-pointer"></i>
                    <span class="text-success ms-1">
                        {{ auth()->user()->unreadNotifications->count() }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end me-sm-n4" aria-labelledby="dropdownMenuButton">
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="font-weight-bold mb-0">New Order
                                            {{ $notification->data['order']['order_number'] }}</span>
                                        <span class="font-weight-light mb-1">Status :
                                            {{ $notification->data['order']['status'] }}</span>
                                        <p class="text-xs mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            @foreach ($notification->data['order']['order_status'] as $status)
                                                @if ($notification->data['order']['status'] == $status['status'])
                                                    {{ $status['created_at'] }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <hr class="horizontal dark mt-0">
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown px-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-dark me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;" data-id="{{ auth()->user()->id }}" id="profile-modal">
                            <div class="d-flex py-1">
                                <div class="my-auto me-5">
                                    <i class="ni ni-single-02 text-sm opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <span class="font-weight-bold">Profile</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <hr class="horizontal dark mt-0">
                    <li class="mb-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto me-5">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="font-weight-bold">Logout</span>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <li class="nav-item d-xl-none px-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="modal fade" id="modal-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <form id="itemForm" name="itemForm" method="post">
                @csrf
                <input type="hidden" name="item_id" id="item_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm mr-2" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm mr-2" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-sm mr-2" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control form-control-sm mr-2" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor HP</label>
                        <input type="number" class="form-control form-control-sm mr-2" name="phone_number" id="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control form-control-sm mr-2" name="address" id="address"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary float-right" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary float-right" id="updateProfile">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
