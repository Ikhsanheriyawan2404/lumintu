@extends('layouts.app', ['title' => 'List Prodcut Hotel'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <form id="itemForm" method="post">
                @csrf
                <div class="card-body p-3 pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body p-3 pb-0">
                                {{ $dataTable->table(['class' => 'table table-sm table-bordered table-striped', 'width' => '100%']) }}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-sm btn-secondary float-right">Cancel</button>
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary float-right"
                            id="createOrder">Simpan
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('custom-scripts')
    {{--    coba --}}
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>

    </script>
@endpush
