@extends('layouts.app', ['title' => 'Pengeluaran'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Pengeluaran</h6>
                        </div>
                        <div class="col-6 text-end">
                            <button id="createNewItem" class="btn btn-outline-primary btn-sm mb-0">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    {{ $dataTable->table(['class' => 'table table-sm table-bordered display responsive nowrap', 'width' => '100%']) }}
                </div>
            </div>
        </div>
    </div>
    @include('admin.cost.modals.edit')
    @include('admin.cost.modals.create')

@endsection

@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        const format = function (num) {
            let str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            let j = 0, len = str.length;
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

            $('body').on('keyup', '#harga', function(e) {
                $(this).val(format($(this).val()));
            });

            $('.select2').select2({
                width: '100%',
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

                let listOptions = '<option selected disable>Pilih Pengeluaran</option>';
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
