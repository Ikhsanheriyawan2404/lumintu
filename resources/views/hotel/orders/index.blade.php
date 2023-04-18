@extends('layouts.app', ['title' => 'Order/Pesanan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Order/Pesanan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('orders.create', []) }}" class="btn btn-outline-primary btn-sm mb-0">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <table id="orders-table" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th class="text-sm font-weight-normal" width="5%">No</th>
                                <th class="text-sm font-weight-normal">Tgl Order</th>
                                <th class="text-sm font-weight-normal">Total</th>
                                <th class="text-sm font-weight-normal">Pembayaran</th>
                                <th class="text-sm font-weight-normal">Status</th>
                                <th class="text-sm font-weight-normal">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('hotel.orders.modals.createOrUpdate')

@endsection

@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('library/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('library/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css')}}">

    <link rel="stylesheet" href="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
    <script src="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}"></script>

    <script>
        $(document).ready(function() {

            let table = $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('orders.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-sm font-weight-normal text-center'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-sm font-weight-normal'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                        className: 'text-sm font-weight-normal'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        className: 'text-sm font-weight-normal'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-sm font-weight-normal'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-sm font-weight-normal'
                    },
                ]
            });

            $('body').on('click', '#showItem', function() {
                var item_id = $(this).data('id');
                $.get("{{ route('orders.index') }}" + '/' + item_id + '/details', function(data) {
                    $('#modal-md').modal('show');
                    $('#total_price').html(`Total : ${data.total_price}`);
                    $('#order_date').html(`Tgl Order : ${data.order_date}`);
                    $('#estimate_date').html(`Estimasi Tgl : ${data.estimate_date}`);
                    $('#customer').html(`Pelanggan : ${data.customer.name}`);
                    data.order_details.forEach((value, i) => {
                        $('tbody#modal').append(`<tr class="items">
                            <td>${i += 1}</td>
                            <td>${value.product_customer.product.name}</td>
                            <td>${value.product_customer.price}</td>
                            <td>${value.qty}</td>
                        </tr>`);
                    });
                    $('.modal-title').html("Detail Order");
                })
                $('tr.items').remove();
            });

        })
    </script>
@endpush
