@extends('layouts.app', ['title' => 'Invoice'])

@section('content')
    <div class="card mb-3">
        <div class="d-flex flex-row-reverse">
            <div class="px-5 py-3">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary" >Kembali</a>
                <button class="btn btn-primary" id="print-keun"><i class="bi bi-printer"></i> Print</button>
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/logo2.png') }}" class="img-fluid rounded-start p-2">
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-6 ps-3">
                            <div class="row mb-2">
                                <h6 class="card-title">Email</h6>
                                <p class="card-text">lumintu.laundry123@gmail.com</p>
                            </div>
                            <div class="row">
                                <h6 class="card-title">No Telepon</h6>
                                <p class="card-text">+6282110271556</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-2">
                                <h6 class="card-title">Alamat</h6>
                                <p class="card-text">Kampung Baru No. 1A RT.007 RW.003 Dangdang Cisauk Kab. Tangerang,
                                    Banten.
                                </p>
                            </div>
                            {{-- <div class="row">
                            <h6 class="card-title">Website</h6>
                            <p class="card-text">lumintusip.com</p>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="ps-4">
                <h3>INVOICE</h3>
            </div>
            <div class="pe-4 flex-grow-1">
                <hr>
            </div>
        </div>
        <div class="card-body px-4">
            <div class="row">
                <div class="col-6">
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <h6 class="card-title">Nomor Order</h6>
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">ORD#{{ $order->order_number }}</p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <h6 class="card-title">Tanggal Order</h6>
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">{{ $order->created_at }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="card-title">Tujuan</h6>
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">{{ $order->customer->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <h6 class="card-title">Alamat</h6>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">{{ $order->customer->user_detail->address }}
                            </p>
                        </div>
                    </div>
{{--                    <div class="row mb-2">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <h6 class="card-title">Penanggungjawab</h6>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-8">--}}
{{--                            <p class="card-text">asik</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Nomor Telepon</h6>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">{{ $order->customer->user_detail->phone_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped my-4">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ITEM</th>
                            <th scope="col" class="text-center">HARGA</th>
                            <th scope="col" class="text-center">KUANTITI</th>
                            <th scope="col" class="text-center">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order->order_details as $data)
                        <tr>
                            <th scope="row">{{ $data->product_customer->product->name }}</th>
                            <td class="text-center">{!! number_format($data->product_customer->price, 2) !!}</td>
                            <td class="text-center">{{ $data->qty }}</td>
                            <td class="text-center">{!! number_format($data->product_customer->price * $data->qty, 2)!!}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <th scope="row" colspan="3" class="text-center">TOTAL</th>
                            <th scope="row" class="text-center">{!! number_format($order->total_price, 2) !!}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Penanggung Jawab Penjemputan</h6>
                        </div>
                        <div class="col-md-8">
                            @if($order->pickups)
                                {{ $order->pickups->valet->name }}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Penanggung Jawab Pengantaran</h6>
                        </div>
                        <div class="col-md-8">
                            @if($order->deliveries)
                                {{ $order->deliveries->valet->name }}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="row bukti">
                        <div class="col-md-4">
                            <h6 class="card-title">Bukti Pembayaran</h6>
                        </div>
                        <div class="col-md-8">
                            <img src="{{ asset('assets/img/login.png') }}" class="img-fluid rounded-start p-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <h5 class="card-title">
                        INFO PEMBAYARAN
                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Transfer</h6>
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>817268126 (BCA)</li>
                                <li>817268126 (BRI)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Contact Person</h6>
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>087839736104 (Thoriq)</li>
                                <li>087839736104 (Thoriq)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row justify-content-center">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid rounded-start p-2"
                            style="height: 100px; width: auto;">
                    </div>
                    <div class="row">
                        <h4 class="card-title text-center">CV. Lumintu SIP</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('print-styles')
    <style>
        @media print {
            .btn {
                display: none;
            }

            .fixed-plugin {
                display: none;
            }

            .navbar {
                display: none;
            }

            .card-header img {
                height: 50px;
            }

            .footer {
                display: none;
            }

            .bukti {
                display: none;
            }
        }
    </style>
@endpush

@push('custom-styles')
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
@endpush

@push('custom-scripts')
    <script>
        $('#print-keun').click(function(){
            window.print();
        });
    </script>
@endpush
