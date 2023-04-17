@extends('layouts.app', ['title' => 'Order/Pesanan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Tambah Order/Pesanan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('orders.index', []) }}" class="btn btn-outline-primary btn-sm mb-0">Kembali</a>
                        </div>
                    </div>
                </div>
                <form id="itemForm" method="post">
                    @csrf
                    <div class="card-body p-3 pb-0">

                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group mb-2">
                                    <li class="list-group-item">Nomor Order : <i id="order_no"></i></li>
                                    <li class="list-group-item">Total : Rp <i id="total_price"></i></li>
                                </ul>
                                @hasrole('superadmin|admin')
                                    <div class="form-group">
                                        <label for="customer">Pelanggan <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-sm select2" name="customer" id="customer">
                                            <option selected disabled>Pilih Pelanggan</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endhasrole
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control form-control-sm" name="description" id="description" rows="3"
                                        placeholder="Catatan..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Pilih Barang" disabled>
                                    <button type="button" class="btn btn-primary mb-0" onclick="showProduct()"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table my-3 table-sm table-hover table-striped table-bordered"
                                        id="table-order">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Kuantitas</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center"><i class="fa fa-cog"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-secondary float-right">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary float-right" id="createOrder">Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Product Modal</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped table-bordered" id="table-product"
                            width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-styles')
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    <!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#customer').select2({
                placeholder: 'Pilih Pelanggan',
                width: '100%'
            });
            let loggedInUser = "{{ auth()->user()->id }}"
            let selectedUser = $('#customer').val();
            if (selectedUser == null) {
                userId = loggedInUser
            } else {
                userId = selectedUser
            }


            let tableListProductOnModal = $('#table-product').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('orders.index') }}" + "/product-datatables/" + userId,
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false
                    },
                    {
                        data: 'product.name'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ]
            });

            $('#customer').on('change', function() {
                selectedUser = $(this).val();
                tableListProductOnModal.ajax.
                    url("{{ route('orders.index') }}" + "/product-datatables/" + selectedUser).load();

                $('.removeProduct').parents('tr').remove();

                calculateAll()
            });

            $('body').on('click', '#createOrder', function(e) {
                e.preventDefault();
                $('#createOrder').attr('disabled', 'disabled');
                $('#createOrder').html('Simpan Pembelian ...');

                let formData = new FormData($('#itemForm')[0]);

                $.ajax({
                    data: formData,
                    url: "{{ route('orders.store') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#createOrder').removeAttr('disabled');
                        $('#createOrder').html("Simpan");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                        window.location.href = "{{ route('orders.index') }}";
                    },
                    error: function(response) {
                        const data = response.responseJSON;
                        $('#createOrder').removeAttr('disabled');
                        $('#createOrder').html("Simpan");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.message,
                        });
                        $.each(data.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            })

            // Menampilkan info data kosong pada tabel order item
            let dataKosong = '<tr class="empty_data"><td colspan="8" class="text-center">Belum ada data</td></tr>'
            $('#table-order tbody').append(dataKosong);

            // Choose item on modals to select in table orders
            $('body').on('click', '.chooseProduct', function(e) {
                e.preventDefault();
                hideProduct();
                var id = $(this).data('id');
                $.get("{{ route('orders.index') }}" + "/" + id + '/product', function(data) {

                    // Get All Item list record on the table orders
                    let allProductId = [];
                    $("input[name='product_id[]']").each(function() {
                        allProductId.push($(this).val());
                    });
                    // Condition if item has arrived on the list tables
                    let match = allProductId.some(productId => productId == id);
                    if (match) {
                        alert('Barang sudah ada')
                    } else {
                        // Put every column input in tables
                        $('#table-order tbody tr.empty_data').remove();

                        // Put every column input in tables
                        var tr = $('<tr>');
                        for (var i = 0; i < data.length; i++) {
                            var td = $('<td class="text-center">').html(data[i]);
                            tr.append(td);
                        }
                        $('#table-order tbody').append(tr);

                        // Trigger For Update Column
                        let qtyElement = $('.qty[data-id=' + id + ']');
                        $(qtyElement).val(1)
                        let qty = 1
                        let price = parseInt($('.price[data-id=' + id + ']')
                            .val().replace(/\./g, ''));
                        let subtotal = qty * price;

                        $(`.subtotal[data-id="${id}"]`).val(subtotal.toLocaleString('id-ID'));

                        calculateAll();
                    }
                });
            })

            // Remove Item on list table
            $('body').on('click', '.removeProduct', function(e) {
                e.preventDefault();
                $(this).parents('tr').remove();

                calculateAll()
            });

            // When Column Qty Per Item Change
            $('body').on('input', '.qty', function() {
                let id = $(this).data('id');
                let qty = parseInt($(this).val());

                if (qty <= 0) $(this).val(1);

                let price = parseInt($('.price[data-id=' + id + ']').val().replace(/\./g, ''));
                let subtotal;
                subtotal = qty * price;

                $(`.subtotal[data-id="${id}"]`).val(subtotal.toLocaleString('id-ID'));

                calculateAll()
            });
        })

        function calculateAll() {
            let subtotalPrice = 0;
            let subtotalArr = [];
            let priceArr = [];
            let qtyArr = [];

            $('.subtotal').each(function() {
                subtotalPrice += parseInt($(this).val().replace(/\./g, ''));
                subtotalArr.push($(this).val().replace(/\./g, ''))
            });

            $('.qty').each(function() {
                qtyArr.push(parseInt($(this).val()))
            })

            $('.price').each(function() {
                priceArr.push($(this).val().replace(/\./g, ''))
            })

            let dataArr = subtotalArr.map((subTotal, index) => {
                let data = {
                    price: priceArr[index],
                    qty: qtyArr[index],
                    subtotal: subTotal
                };
                return data;
            });

            $(`#total_price`).html(subtotalPrice.toLocaleString('id-ID'));
        }

        function showProduct() {
            $('#modalProduct').modal('show');
        }

        function hideProduct() {
            $('#modalProduct').modal('hide');
        }
    </script>
@endpush
