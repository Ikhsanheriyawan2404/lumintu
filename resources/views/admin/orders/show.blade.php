@extends('layouts.app', ['title' => 'Order/Pesanan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-5">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Order Details</h6>
                            <p class="text-sm mb-0">
                                Order no. <b>241342</b> from <b>{{ $order->created_at }}</b>
                            </p>
                            <p class="text-sm">
                                Total : <b><i>Rp {{ number_format($order->total_price) }}</i></b>
                            </p>
                        </div>
                        <a href="javascript:;" class="btn bg-gradient-secondary ms-auto mb-0">Invoice</a>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="d-flex">
                                <div>
                                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/smartwatch.jpg"
                                        class="avatar avatar-xxl me-3" alt="product image">
                                </div>
                                <div>
                                    <h6 class="text-lg mb-0 mt-2">{{ $order->customer->name }}</h6>
                                    <p class="text-sm mb-3">Order was {{ $order->status }} {{ $order->created_at->diffForHumans() }}</p>
                                    Order Proses Status : <span class="badge badge-sm bg-gradient-success">{{ $order->status }}</span>
                                    <br>
                                    Order Pembayaran Status : <span class="badge badge-sm bg-gradient-primary">{{ $order->payment_status }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                            <a href="javascript:;" class="btn bg-gradient-info mb-0">Contact Us</a>
                            <p class="text-sm mt-2 mb-0">Do you like the product? Leave us a review <a
                                    href="javascript:;">here</a>.</p>
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
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $status->status }}</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $status?->created_at ?? 'Belum tahap ini' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-12">
                            <h6 class="mb-3">Barang detail</h6>
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                               <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Kauntiti</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_details as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->product_customer->product->name }}</td>
                                                <td>{{ number_format($row->product_customer->price) }}</td>
                                                <td>{{ number_format($row->qty) }}</td>
                                                <td>{{ number_format($row->qty * $row->product_customer->price) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                               </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endpush
