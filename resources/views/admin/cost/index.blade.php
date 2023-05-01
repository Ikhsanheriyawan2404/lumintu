@extends('layouts.app', ['title' => 'Pengeluaran'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h5 class="mb-0">Pengeluaran</h5>
                        </div>
                        <div class="col-6 text-end">
                            <button id="createNewItem" class="btn btn-outline-primary btn-sm mb-0">Tambah</button>
                        </div>
                        <div class="col-11 col-lg-3 mx-auto mx-lg-0 mt-3">
                            <div class="form-group d-flex flex-row align-items-center gap-2">
                                <label for="filterDate" class="font-weight-normal my-auto">Select</label>
                                <select name="filterDate" id="filterDate" class="form-control form-control-sm">
                                    <option value="today" selected>Hari Ini</option>
                                    <option value="yesterday">Kemarin</option>
                                    <option value="thisWeek">Minggu Ini</option>
                                    <option value="lastWeek">Minggu Lalu</option>
                                    <option value="thisMonth">Bulan Ini</option>
                                    <option value="lastMonth">Bulan Lalu</option>
                                    <option value="all">Semuannya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 text-center text-lg-end mt-lg-3">
                            <form id="formExport" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" id="btnExportExcel">Export
                                    Excel</button>
                                <button type="button" class="btn btn-sm btn-danger" id="btnExportPDF">Export PDF</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-sm table-bordered display responsive nowrap', 'width' => '100%']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.cost.modals.edit')
    @include('admin.cost.modals.create')
@endsection

@push('custom-styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('library/http_cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('library/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('custom-scripts')
    <!-- Select2 -->
    <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
    <script src="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.min.js') }}"></script>


    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const format = function(num) {
            let str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            let j = 0,
                len = str.length;
            for (; j < len; j++) {
                if (str[j] !== ",") {
                    output.push(str[j]);
                    if (i % 3 === 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $(document).ready(function() {

            $('#filterDate').on('change', function() {

                let table = $('#cost-table').DataTable();
                table.ajax.url(`
                    {{ route('cost.index') }}?filterDate=${$('#filterDate').val()}
                `).draw();
            });

            $('body').on('keyup', '#harga', function(e) {
                $(this).val(format($(this).val()));
            });

            $('.select2').select2({
                // aktifkan search input
                tags: true

            });

            $('#btnExportExcel').on('click', function(e) {
                e.preventDefault();

                $('#btnExportExcel').attr('disabled', 'disabled');
                $('#btnExportExcel').html('Loading ...');

                var csrf_token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('costs.export-excel') }}",
                    data: {
                        _token: csrf_token,
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    type: "POST",
                    success: function(data) {
                        var blob = new Blob([data], {
                            type: 'application/vnd.ms-excel'
                        });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = Date.now() + 'orders.xlsx';

                        // link.onload = function() {
                        // };
                        $('#btnExportExcel').html('Export Excel');
                        $('#btnExportExcel').removeAttr('disabled');

                        document.body.appendChild(link);
                        link.click();
                    },
                    error: function(data) {
                        $('#btnExportExcel').removeAttr('disabled');
                        $('#btnExportExcel').html('Export Excel');
                        alert("Error")
                    }
                });
            });

            $('#btnExportPDF').on('click', function() {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $('#btnExportPDF').attr('disabled', 'disabled');
                $('#btnExportPDF').html('Loading ...');
                $.ajax({
                    url: "{{ route('export.pdf') }}",
                    data: {
                        _token: csrf_token,
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    type: 'GET',
                    success: function(response) {
                        var blob = new Blob([response], {
                            type: 'application/pdf'
                        });
                        var url = window.URL.createObjectURL(blob);
                        $('#btnExportPDF').html('Export PDF');
                        $('#btnExportPDF').removeAttr('disabled');
                        var win = window.open(url, 'targetWindow',
                            'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=800,height=600'
                        );
                        win.blur();
                        window.focus();
                    },
                    error: function(data) {
                        $('#btnExportPDF').removeAttr('disabled');
                        $('#btnExportPDF').html('Export PDF');
                        alert("Error")
                    }
                });
            });


            $('#createNewItem').click(function() {
                setTimeout(function() {
                    $('#name').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Tambah Data Pengeluaran");
                $('.removeRow').parents('tr').remove();
                $('#modal-create').modal('show');
            });

            $('body').on('click', '#editItem', function() {
                var item_id = $(this).data('id');
                $.get("{{ route('cost.index') }}" + '/' + item_id + '/edit', function(data) {
                    $('#modal-md').modal('show');
                    setTimeout(function() {
                        $('#name').focus();
                    }, 500);
                    $('.modal-title').html("Edit Jenis");
                    $('#saveBtn').removeAttr('disabled');
                    $('#saveBtn').html("Simpan");
                    $('#item_id').val(data.id);
                    $('#name').val(data.name);
                    $('#price').val(data.price);
                    $('#kwantitas').val(data.qty);
                    $('#date').val(data.date);
                    $('#description').val(data.description);
                })
            });

            $('body').on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                var confirmation = confirm("Apakah yakin untuk menghapus?");
                if (confirmation) {
                    var item_id = $(this).data('id');
                    var formData = new FormData($('#deleteDoc')[0]);
                    $('.deleteBtn').attr('disabled', 'disabled');
                    $('.deleteBtn').html('...');
                    $.ajax({
                        data: formData,
                        url: "{{ route('cost.index') }}" + '/' + item_id,
                        contentType: false,
                        processData: false,
                        type: "POST",
                        success: function(data) {
                            $('#deleteDoc').trigger("reset");
                            $('#cost-table').DataTable().draw();
                            toastr.success(data.message);
                        },
                        error: function(data) {
                            $('.deleteBtn').removeAttr('disabled');
                            $('.deleteBtn').html('Hapus');
                            // toastr.error(data.responseJSON.message)
                            toastr.error('Tidak bisa hapus data karena sudah digunakan')
                        }
                    });
                }
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                save('#saveBtn', '#createForm', '#modal-create')
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                save('#updateBtn', '#updateForm', '#modal-md')
            });

            $('body').on('click', '.removeRow', function(e) {
                e.preventDefault();
                $(this).parents('tr').remove();
            });

            $('body').on('click', '#createRow', function(e) {
                e.preventDefault();

                let arrayData = {!! json_encode($master_cost) !!};

                let listOptions = '<option selected disabled>Pilih Pengeluaran</option>';
                $.each(arrayData, function(key, value) {
                    listOptions += `<option value="${value.name}">${value.name}</option>`;
                });

                let row = `
                    <tr>
                        <td>
                            <select class="form-control form-control-sm select2" name="name[]">
                                ${listOptions}
                            </select>
                        </td>
                        <td>
                            <input type="text" name="harga[]" id="harga" class="form-control form-control-sm" placeholder="Harga">
                        </td>
                        <td>
                            <input type="text" name="qty[]" id="qty" class="form-control form-control-sm" placeholder="Kuantitas">
                        </td>
                        <td>
                            <input type="text" name="description[]" id="description" class="form-control form-control-sm" placeholder="Deskripsi">
                        </td>
                        <td>
                            <a class="btn btn-sm btn-danger removeRow"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                `

                $('#list-costs tbody').append(row);

                $('body .select2').select2({
                    width: '100%',
                });
            });
        });

        function save(btn, itemForm, modal) {
            $(btn).attr('disabled', 'disabled');
            $(btn).html('Simpan ...');
            var formData = new FormData($(itemForm)[0]);
            $.ajax({
                data: formData,
                url: "{{ route('cost.store') }}",
                contentType: false,
                processData: false,
                type: "POST",
                success: function(data) {
                    $('#itemForm').trigger("reset");
                    $(modal).modal('hide');
                    $('#cost-table').DataTable().draw();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    });
                },
                error: function(data) {
                    $(btn).removeAttr('disabled');
                    $(btn).html("Simpan");
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
        }
    </script>
@endpush
