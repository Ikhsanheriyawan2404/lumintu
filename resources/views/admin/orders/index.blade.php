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
                                <option selected disabled>Pilih Status Pembayaran</option>
                                <option value="unpaid">Belum Dibayar</option>
                                <option value="paid">Sudah Dibayar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterCustomer">Customer</label>
                            <select name="filterCustomer" id="filterCustomer" class="form-control form-control-sm">
                                <option selected disabled>Pilih Customer</option>
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
                                <option selected disabled>Pilih Bulan</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month['key'] }}">{{ $month['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
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
        $(document).ready(function() {

            $('#filterMonth, #filterStatus, #filterCustomer').on('change', function() {
                let table = $('#order-table').DataTable();
                table.ajax.url(`
                    {{ route('orders.index') }}?filterMonth=${$('#filterMonth').val()}&filterStatus=${$('#filterStatus').val()}&filterCustomer=${$('#filterCustomer').val()}
                `).draw();
            });

            $('#btnExportExcel').on('click', function(e) {
                e.preventDefault();

                $('#btnExportExcel').attr('disabled', 'disabled');
                $('#btnExportExcel').html('Loading ...');

                var formData = new FormData($('#formExport')[0]);
                formData.append('filterMonth', $('#filterMonth').val());
                formData.append('filterStatus', $('#filterStatus').val());
                formData.append('filterCustomer', $('#filterCustomer').val());

                $.ajax({
                    data: formData,
                    url: "{{ route('orders.export-excel') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#formExport').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                        $('#btnExportExcel').removeAttr('disabled');
                        $('#btnExportExcel').html('Export Excel');
                    },
                    error: function(data) {
                        $('#btnExportExcel').removeAttr('disabled');
                        $('#btnExportExcel').html('Export Excel');
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
