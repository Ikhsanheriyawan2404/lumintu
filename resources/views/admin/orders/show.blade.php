@extends('layouts.app', ['title' => 'Order/Pesanan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-5">
                <div class="card-header p-4 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Order Details</h6>
                            <p class="text-sm mb-0">
                                Order no. <b>{{ $order->order_number }}</b> from <b>{{ $order->created_at }}</b>
                            </p>
                            <p class="text-sm">
                                Total : <b><i>Rp {{ number_format($order->total_price) }}</i></b>
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('orders.index', []) }}" class="btn bg-gradient-secondary ms-auto mb-0">Kembali</a>
                            <form action="{{ route('orders.export-detail-pdf', $order->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn bg-gradient-danger ms-auto mb-0">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="d-flex">
                                <div>
                                    <h6 class="text-lg mb-0 mt-2">{{ $order->customer->name }}</h6>
                                    <p class="text-sm mb-3">Order was {{ $order->status }}
                                        {{ $order->created_at->diffForHumans() }}</p>
                                    Order Proses Status : <span
                                        class="badge badge-sm bg-gradient-success">{{ $order->status }}</span>
                                    <br>
                                    Order Pembayaran Status : <span
                                        class="badge badge-sm bg-gradient-primary">{{ $order->payment_status }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                            <p class="text-sm mt-2 mb-0">Order Pickup oleh {{ $order->pickups?->valet?->name }}</p>
                            <p class="text-sm mt-2 mb-0">Order Delivery oleh {{ $order->deliveries?->valet?->name }} </p>
                        </div>
                    </div>

                    <hr class="horizontal dark mt-4 mb-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <h6 class="mb-3">Track order</h6>
                            <div class="timeline timeline-one-side">
                                @foreach ($order_statuses as $status)
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            @if ($status->status == $order->status)
                                                <i class="ni ni-check-bold text-success text-gradient"></i>
                                            @else
                                                <i class="ni ni-bell-55 text-secondary"></i>
                                            @endif
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order Status
                                                {{ $status->status }}</h6>

                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                {{ $status?->created_at ?? 'Belum tahap ini' }}</p>

                                            @if (
                                                $status->status == $order->status &&
                                                    $order->status->value != 'done' &&
                                                    auth()->user()->hasRole('superadmin|admin'))
                                                <button class="btn btn-sm btn-primary" id="btnProcessStatus">Proses</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-12">
                            <h6 class="mb-3">Barang detail</h6>
                            <div class="card card-body border card-plain border-radius-lg d-flex flex-row table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-sm font-weight-normal" width="5%">No</th>
                                            <th class="text-sm font-weight-normal">Nama</th>
                                            <th class="text-sm font-weight-normal">Harga</th>
                                            <th class="text-sm font-weight-normal">Kuantiti</th>
                                            <th class="text-sm font-weight-normal">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_details as $row)
                                            <tr>
                                                <td class="text-sm font-weight-normal text-center">{{ $loop->iteration }}
                                                </td>
                                                <td class="text-sm font-weight-normal">
                                                    {{ $row->product_customer->product->name }}</td>
                                                <td class="text-sm font-weight-normal">
                                                    {{ number_format($row->product_customer->price) }}</td>
                                                <td class="text-sm font-weight-normal">{{ number_format($row->qty) }}</td>
                                                <td class="text-sm font-weight-normal">
                                                    {{ number_format($row->qty * $row->product_customer->price) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <hr>

                            @if(auth()->user()->hasRole('hotel'))
                                <button type="submit" class="btn btn-sm btn-primary" id="uploadVerifPayment">Upload Bukti Pembayaran</button>
                                @include('admin.orders.partials.table-payments')
                            @elseif (auth()->user()->hasRole('superadmin|admin'))
                                <form action="{{ route('orders.paid', $order->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary" >Approve Pembayaran</button>
                                </form>
                                @include('admin.orders.partials.table-payments')
                            @endif
                        </div>
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
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'path',
                        name: 'path',
                        orderable: false, searchable: false, className: 'dt-body-center'
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
                        $.each(data.responseJSON.errors, function (index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });
        });
    </script>
@endpush
