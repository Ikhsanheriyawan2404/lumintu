@extends('layouts.app', ['title' => 'Order/Pesanan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterStatus">Status Pembayaran</label>
                            <select name="filterStatus" id="filterStatus" class="form-control form-control-sm">
                                <option value="all">Semua</option>
                                <option value="unpaid">Belum Dibayar</option>
                                <option value="paid">Sudah Dibayar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterCustomer">Customer</label>
                            <select name="filterCustomer" id="filterCustomer" class="form-control form-control-sm">
                                <option value="all">Semua</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterMonth">Bulan</label>
                            <select name="filterMonth" id="filterMonth" class="form-control form-control-sm">
                                <option value="all">Semua</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month['key'] }}">{{ $month['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-13">
                        <ul>
                            <li id="resultCustomer" class="text-dark">Customer : </li>
                            <li id="resultMonth" class="text-dark">Bulan : </li>
                            <li id="resultStatus" class="text-dark">Status : </li>
                        </ul>
                    </div>
                </div>

                <form id="formExport" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-success" id="btnExportExcel">Export Excel</button>
                    <button class="btn btn-sm btn-danger">Export PDF</button>
                </form>
            </div>
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Order/Pesanan</h6>
                        </div>
                        <div class="col-6 text-end">
                            @hasrole('superadmin|hotel')
                                <a href="{{ route('orders.create', []) }}" class="btn btn-outline-primary btn-sm mb-0">Tambah</a>
                            @endhasrole()
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    {{ $dataTable->table(['class' => 'table align-items-center display responsive nowrap', 'width' => '100%']) }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.orders.modals.createOrUpdate')

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

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            $('#filterMonth, #filterStatus, #filterCustomer').on('change', function() {
                $('#resultCustomer').html('Customer : ' + $('#filterCustomer option:selected').text());
                $('#resultMonth').html('Bulan : ' + $('#filterMonth option:selected').text());
                $('#resultStatus').html('Status : ' + $('#filterStatus option:selected').text());

                let table = $('#order-table').DataTable();
                table.ajax.url(`
                    {{ route('orders.index') }}?filterMonth=${$('#filterMonth').val()}&filterStatus=${$('#filterStatus').val()}&filterCustomer=${$('#filterCustomer').val()}
                `).draw();
            });


                $('#btnExportExcel').on('click', function(e) {
                    e.preventDefault();

                    $('#btnExportExcel').attr('disabled', 'disabled');
                    $('#btnExportExcel').html('Loading ...');

                    // var formData = new FormData($('#formExport')[0]);
                    // formData.append('filterMonth', $('#filterMonth').val());
                    // formData.append('filterStatus', $('#filterStatus').val());
                    // formData.append('filterCustomer', $('#filterCustomer').val());
                    var csrf_token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        // data: formData,
                        url: "{{ route('orders.export-excel') }}",
                        data: {
                            _token: csrf_token,
                            filterMonth: $('#filterMonth').val(),
                            filterStatus: $('#filterStatus').val(),
                            filterCustomer: $('#filterCustomer').val(),
                        },
                        xhrFields: {
                            responseType: 'blob'
                        },
                        type: "POST",
                        success: function(data) {
                            var blob = new Blob([data], { type: 'application/vnd.ms-excel' });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = 'orders.xlsx';

                            link.onload = function() {
                                $('#btnExportExcel').html('Export Excel');
                                $('#btnExportExcel').removeAttr('disabled');
                            };

                            document.body.appendChild(link);
                            link.click();
                        },
                        error: function(data) {
                            $('#btnExportExcel').removeAttr('disabled');
                            $('#btnExportExcel').html('Export Excel');
                            console.log(data)
                        }
                    });
                });

            // setInterval(() => {
            //     let table = $('#order-table').DataTable();
            //     let totalRowData = table.rows().count();
            //     console.log(totalRowData)
            //     // table.draw();
            //     let newTable = $('#order-table').DataTable();
            //     let newTotalRowData = newTable.rows().count();
            //     console.log(newTotalRowData)
            //     if (newTotalRowData > totalRowData) {
            //         toastr.success('Data berhasil diupdate');
            //     }
            // }, 2000);

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
