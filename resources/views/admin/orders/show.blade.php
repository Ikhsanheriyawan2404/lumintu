@extends('layouts.app', ['title' => 'Order/Pesanan'])

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-5 col-lg-6 align-items-center">
                    <h5>Detail Order/Pesanan</h5>
                    <p class="text-sm mb-3">Order was {{ $order->status }}
                        {{ $order->created_at->diffForHumans() }}</p>
                </div>
                <div class="col-7 col-lg-6 text-end align-items-center">
                    <a href="{{ route('orders.index', []) }}" class="btn btn-secondary">Kembali</a>
                    @role('superadmin|hotel|admin')
                        <a href="{{ route('orders.export-detail-pdf', $order->id) }}" class="btn btn-primary">Invoice</a>
                    @endrole
                </div>
            </div>
        </div>
        <hr class="horizontal dark mt-0 mb-4">
        <div class="card-body">
            <div class="row">
                {{-- Track Order --}}
                <div class="container-fluid col-12 col-lg-3">
                    <h5 class="text-center mb-2 mb-lg-5">Track Order/Pesanan</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="horizontal-timeline">
                                <ul class="list-inline items">
                                    @foreach ($order_statuses as $status)
                                        <li class="list-inline-item items-list">
                                            <div class="px-4">
                                                <div class="event-date badge bg-info rounded-circle w-5">
                                                    @if ($status->status == $order->status)
                                                        <i class="bi bi-clock"></i>
                                                    @else
                                                        <i class="bi bi-box"></i>
                                                    @endif
                                                </div>
                                                <h6 class="pt-2">{{ $status->status }}</h6>
                                                <p class="text-muted">{{ $status?->created_at ?? 'Belum tahap ini' }}</p>
                                                {{-- <span class="text-muted">Dibuat oleh : {{ $status?->user?->name ?? '' }}</span> --}}
                                                <div>
                                                    @if (
                                                        $status->status == $order->status &&
                                                            $order->status->value != 'done' &&
                                                            auth()->user()->hasRole('superadmin|admin'))
                                                        <button class="btn btn-sm btn-primary"
                                                            id="btnProcessStatus">Proses</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid col-12 col-lg-9">
                    {{-- Rincian Order --}}
                    <div class="row">
                        <h5 class="text-center mb-2 mb-lg-5">Rincian Order/Pesanan</h5>
                        <div class="row">
                            <div class="col-12 col-lg-6 text-start">
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title">Nama Customer:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->customer->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title">Nomor Order:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->order_number }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title">Tanggal Order:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->created_at }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title">Total Order:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">Rp. {{ number_format($order->total_price) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-start">
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title text-lg-end">Status Pembayaran:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->payment_status }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title text-lg-end">Status Order:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->status }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title text-lg-end">PJ Pickup:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->pickups?->valet?->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 class="card-title text-lg-end">PJ Deliver:</h6>
                                    </div>
                                    <div class="col-7">
                                        <p class="card-text">{{ $order->deliveries?->valet?->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Rincian Barang --}}
                    <div class="row">
                        <h5 class="text-center my-3 my-lg-4">Rincian Barang</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-sm font-weight-bold" width="5%">No</th>
                                        <th class="text-sm font-weight-bold">Nama</th>
                                        <th class="text-sm font-weight-bold">Harga</th>
                                        <th class="text-sm font-weight-bold">Kuantiti</th>
                                        <th class="text-sm font-weight-bold">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_details as $row)
                                        <tr>
                                            <td class="text-sm font-weight-normal text-center">{{ $loop->iteration }}
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                {{ $row->product_customer->product->name }}</td>
                                            <td class="text-sm font-weight-normal text-center">
                                                {{ number_format($row->product_customer->price) }}</td>
                                            <td class="text-sm font-weight-normal text-center">
                                                {{ number_format($row->qty) }}</td>
                                            <td class="text-sm font-weight-normal text-center">
                                                {{ number_format($row->qty * $row->product_customer->price) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Bukti Pembayaran --}}
                    <div class="row">
                        <h5 class="text-center my-3 my-lg-4">Bukti Pembayaran</h5>
                        @if (auth()->user()->hasRole('hotel'))
                            <button type="submit" class="btn btn-sm btn-primary" id="uploadVerifPayment">Upload
                                Bukti
                                Pembayaran</button>
                            @include('admin.orders.partials.table-payments')
                        @elseif (auth()->user()->hasRole('superadmin|admin'))
                            @if ($order->payment_status == 'unpaid')
                                <form action="{{ route('orders.paid', $order->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Approve Pembayaran</button>
                                </form>
                            @else
                                @if (auth()->user()->hasRole('superadmin'))
                                    <form action="{{ route('orders.unpaid', $order->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Cancel
                                            Pembayaran</button>
                                    </form>
                                @endif
                            @endif
                            @include('admin.orders.partials.table-payments')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin.orders.modals.processStatus')
    <!-- Modal Upload Agreement Document -->
    @include('admin.orders.modals.uploadPayment')
    <!-- /.modal -->
@endsection

@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <style>
        .horizontal-timeline .items {
            border-top: 3px solid #e9ecef;
        }

        .horizontal-timeline .items .items-list {
            display: block;
            position: relative;
            text-align: center;
            padding-top: 70px;
            margin-right: 0;
        }

        .horizontal-timeline .items .items-list:before {
            content: "";
            position: absolute;
            height: 36px;
            border-right: 2px dashed #dee2e6;
            top: 0;
        }

        .horizontal-timeline .items .items-list .event-date {
            position: absolute;
            top: 36px;
            left: 0;
            right: 0;
            width: 75px;
            margin: 0 auto;
            font-size: 0.9rem;
            padding-top: 8px;
            padding-right: 20px;
        }

        /* @media (min-width: 1140px) {
                                                            .horizontal-timeline .items .items-list {
                                                                display: inline-block;
                                                                width: 24%;
                                                                padding-top: 45px;
                                                            }

                                                            .horizontal-timeline .items .items-list .event-date {
                                                                top: -15px;
                                                                padding-right: 20px;
                                                            }
                                                        } */
    </style>
@endpush

@push('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            let tableDocs = $('#datatables-payment').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('payments.datatables', $order->id) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'path',
                        name: 'path',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                ]
            });

            let status = $('#currentStatus').val();
            let nextStatus = $('#nextStatus').val();

            $('#btnProcessStatus').click(function() {
                if (status == 'approve' || status == 'done' || status == 'pickup' || status == 'delivery') {
                    $('#chooseValet').hide();
                    $('#labelValet').hide();
                } else {
                    $('#labelValet').show();
                    $('#chooseValet').show();
                }
                $('#modalProcessStatus').modal('show');
                $('.modal-title').html(`Apakah yakin ingin meneruskan ke proses ${nextStatus}?`);
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $('#saveBtn').attr('disabled', 'disabled');
                $('#saveBtn').html('Simpan ...');
                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('orders.changeOrderStatus', $order->id) }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#itemForm').trigger("reset");
                        $('#modalProcessStatus').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                        window.location.reload();
                    },
                    error: function(data) {
                        $('#saveBtn').removeAttr('disabled');
                        $('#saveBtn').html("Simpan");
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

            $('#uploadVerifPayment').on('click', function() {
                setTimeout(function() {
                    $('#name').focus();
                }, 500);
                $('#modal-upload-docs').modal('show');
                $('#btnUploadDoc').removeAttr('disabled');
                $('#btnUploadDoc').html("Upload");
                $('#uploadForm').trigger("reset");
            });

            $('#btnUploadDoc').click(function(e) {
                e.preventDefault();
                var formData = new FormData($('#uploadForm')[0]);
                $('#btnUploadDoc').attr('disabled', 'disabled');
                $('#btnUploadDoc').html('Loading ...');
                $.ajax({
                    data: formData,
                    url: "{{ route('payments.upload') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#uploadForm').trigger("reset");
                        $('#modal-upload-docs').modal('hide');
                        tableDocs.draw();
                        toastr.success(data.message);
                    },
                    error: function(data) {
                        $('#btnUploadDoc').removeAttr('disabled');
                        $('#btnUploadDoc').html("Upload");
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
@endpush
