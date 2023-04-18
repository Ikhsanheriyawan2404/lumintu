@extends('layouts.app', ['title' => 'Kategori Barang'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Kategori</h6>
                        </div>
                        <div class="col-6 text-end">
                            <button id="createNewItem" class="btn btn-outline-primary btn-sm mb-0">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    {{ $dataTable->table(['class' => 'table align-items-center display responsive nowrap', 'width' => '100%']) }}
                </div>
            </div>
        </div>
    </div>
@include('admin.categories.modals.createOrUpdate')

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


    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {

            $('#createNewItem').click(function() {
                setTimeout(function() {
                    $('#name').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#item_id').val('');
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Tambah Jenis");
                $('#modal-md').modal('show');
            });

            $('body').on('click', '#editItem', function() {
                var item_id = $(this).data('id');
                $.get("{{ route('categories.index') }}" + '/' + item_id + '/edit', function(data) {
                    $('#modal-md').modal('show');
                    setTimeout(function() {
                        $('#name').focus();
                    }, 500);
                    $('.modal-title').html("Edit Jenis");
                    $('#saveBtn').removeAttr('disabled');
                    $('#saveBtn').html("Simpan");
                    $('#item_id').val(data.id);
                    $('#name').val(data.name);
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
                        url: "{{ route('categories.index') }}" + '/' + item_id,
                        contentType: false,
                        processData: false,
                        type: "POST",
                        success: function(data) {
                            $('#deleteDoc').trigger("reset");
                            $('#categories-table').DataTable().draw();
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
                $('#saveBtn').attr('disabled', 'disabled');
                $('#saveBtn').html('Simpan ...');
                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('categories.store') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#itemForm').trigger("reset");
                        $('#modal-md').modal('hide');
                        $('#categories-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
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
        });
    </script>
@endpush
