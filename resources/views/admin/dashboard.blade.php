@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <!-- Summary Count Data -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesanan</p>
                                <h5 class="font-weight-bolder" id="orders">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder"><a
                                            href="{{ route('orders.index', []) }}">Cek</a></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @role('admin|superadmin|owner')
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Hotel</p>
                                    <h5 class="font-weight-bolder" id="customers">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"><a
                                                href="{{ url('/hotel') }}">Cek</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pegawai</p>
                                    <h5 class="font-weight-bolder" id="employees">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"><a
                                                href="{{ url('/users') }}">Cek</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengeluaran</p>
                                    <h5 class="font-weight-bolder" id="costs">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"><a
                                                href="{{ url('/cost') }}">Cek</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
    </div>
    @role('admin|superadmin|owner')
        <!-- Chart Accumulation Data -->
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Data Penjualan</h6>
                        <p class="text-sm mb-0">
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">

                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Data Pelanggan Yang Order</h6>
                        <p class="text-sm mb-0">
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="pie-chart" class="chart-canvas" height="600" width="480"
                                style="display: block; box-sizing: border-box; height: 300px; width: 240px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Data Penjualan</h6>
                        <p class="text-sm mb-0">
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-bar" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Pesanan Terbaru</h6>
                        </div>
                    </div>
                    <div class="table-responsive text-wrap">
                        <table class="table align-items-center table-hover">
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="w-20">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-3">
                                                    <p class="text-xs font-weight-bold mb-0">Waktu:</p>
                                                    <h6 class="text-sm mb-0">{{ $order->created_at }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-20">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-3">
                                                    <p class="text-xs font-weight-bold mb-0">Pelanggan:</p>
                                                    <h6 class="text-sm mb-0">{{ $order->customer->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm mb-0">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    @role('hotel')
        <!-- Table History Data -->
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Pesanan Terbaru</h6>
                        </div>
                    </div>
                    <div class="table-responsive text-wrap">
                        <table class="table align-items-center table-hover">
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="mx-2">
                                                <p class="text-xs font-weight-bold mb-0">Waktu:</p>
                                                <h6 class="text-sm mb-0">{{ $order->created_at }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="me-2">
                                                <p class="text-xs font-weight-bold mb-0">No. Order:</p>
                                                <h6 class="text-sm mb-0">{{ $order->order_number }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Barang:</p>
                                                <h6 class="text-sm mb-0">{{ $order->order_details()->sum('qty') }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Total Harga:</p>
                                                <h6 class="text-sm mb-0">Rp. {{ number_format($order->total_price) }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm mb-0">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-5 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Kategori</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <i class="ni ni-tag text-white opacity-10"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">{{ $category->name }}</h6>
                                            <span class="text-xs">{{ $category->products()->count() }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    @endrole
    @role('valet')
        <!-- Table History Data -->
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Pesanan Terbaru</h6>
                        </div>
                    </div>
                    <div class="table-responsive text-wrap">
                        <table class="table align-items-center table-hover">
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="mx-2">
                                                <p class="text-xs font-weight-bold mb-0">Waktu:</p>
                                                <h6 class="text-sm mb-0">{{ $order->created_at }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="me-2">
                                                <p class="text-xs font-weight-bold mb-0">No. Order:</p>
                                                <h6 class="text-sm mb-0">{{ $order->order_number }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="me-2">
                                                <p class="text-xs font-weight-bold mb-0">Hotel:</p>
                                                <h6 class="text-sm mb-0">{{ $order->customer->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Barang:</p>
                                                <h6 class="text-sm mb-0">{{ $order->order_details()->sum('qty') }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Total Harga:</p>
                                                <h6 class="text-sm mb-0">Rp. {{ number_format($order->total_price) }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm mb-0">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection

@push('custom-scripts')
    <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function(){
                if (route('dashboard.summary')) {
                    location.reload();
                }
            }, 100);
            $.get("{{ route('dashboard.summary') }}", function(data) {
                $('#orders').html(data.orders)
                $('#costs').html(data.costs)
                $('#customers').html(data.customers)
                $('#employees').html(data.employees)
            });

            $.get("{{ route('dashboard.chartOrder') }}", function(data) {
                var ctx1 = document.getElementById("chart-line").getContext("2d");
                new Chart(ctx1, {
                    type: "line",
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: "Penjualan",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#5e72e4",
                            backgroundColor: gradientStroke1,
                            borderWidth: 3,
                            fill: true,
                            data: data.orders,
                            maxBarThickness: 6

                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    color: '#fbfbfb',
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    color: '#ccc',
                                    padding: 20,
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });
            });


            $.get("{{ route('dashboard.chartBar') }}", function(data) {
                var ctx1 = document.getElementById("chart-bar").getContext("2d");
                const allValues = data.thisMonth.concat(data.lastMonth);
                new Chart(ctx1, {
                    type: "bar",
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: "Bulan Sekarang",
                                data: data.thisMonth,
                                backgroundColor: '#0000CC',

                            },
                            {
                                label: "Bulan Lalu",
                                data: data.lastMonth,
                                backgroundColor: '#FFFF00',
                                borderColor: 'rgba(0, 99, 132, 1)',
                            },
                        ],
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Data Penjualan'
                            },
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true,
                                // stepSize: 1,
                            }],
                            y: {

                                max: Math.max(...allValues) + 1,
                                min: 0,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    },
                });
            });

            $.get("{{ route('dashboard.customer-ordered') }}", function(data) {
                // Pie chart
                var ctx4 = document.getElementById("pie-chart").getContext("2d");

                new Chart(ctx4, {
                    type: "pie",
                    data: {
                        labels: data.productNames,
                        datasets: [{
                            label: "Projects",
                            weight: 9,
                            cutout: 0,
                            tension: 0.9,
                            pointRadius: 2,
                            borderWidth: 2,
                            backgroundColor: ['#17c1e8', '#5e72e4', '#3A416F', '#a8b8d8'],
                            data: data.productQuantities,
                            fill: false
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    display: false
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    display: false,
                                }
                            },
                        },
                    },
                });
            });
        });
    </script>
@endpush
