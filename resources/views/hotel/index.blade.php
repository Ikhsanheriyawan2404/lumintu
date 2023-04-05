@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Hotel</h6>
                  </div>
                  <div class="col-6 text-end">
                    <button id="createNewItem" class="btn btn-outline-primary btn-sm mb-0">Tambah</button>
                  </div>
                </div>
              </div>
              <div class="card-body p-3 pb-0">
                {{ ($dataTable->table(['class' => 'table table-sm table-bordered table-striped', 'width' => '100%'])) }}
              </div>
            </div>
          </div>
    </div>
</div>

@include('products.modals.createOrUpdate')

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function () {

        $('#createNewItem').click(function() {
            setTimeout(function() {
                $('#name').focus();
            }, 500);
            $('#saveBtn').removeAttr('disabled');
            $('#saveBtn').html("Simpan");
            $('#item_id').val('');
            $('#itemForm').trigger("reset");
            $('.modal-title').html("Tambah Pegawai");
            $('#modal-md').modal('show');
        });

        $('body').on('click', '#editItem', function() {
            var item_id = $(this).data('id');
            $.get("{{ route('products.index') }}" + '/' + item_id + '/edit', function(data) {
                $('#modal-md').modal('show');
                setTimeout(function() {
                    $('#username').focus();
                }, 500);
                $('.modal-title').html("Edit Pegawai");
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#item_id').val(data.id);
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#password').val(data.password);
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
                    url: "{{ route('products.index') }}" + '/' + item_id,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#deleteDoc').trigger("reset");
                        $('#products-table').DataTable().draw();
                        toastr.success(data.message);
                    },
                    error: function(data) {
                        $('.deleteBtn').removeAttr('disabled');
                        alert(data.error)
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
                url: "{{ route('products.store') }}",
                contentType: false,
                processData: false,
                type: "POST",
                success: function(data) {
                    $('#itemForm').trigger("reset");
                    $('#modal-md').modal('hide');
                    $('#products-table').DataTable().draw();
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
                    $.each(data.responseJSON.errors, function (index, value) {
                        toastr.error(value);
                    });
                }
            });
        });
    });
</script>
@endsection