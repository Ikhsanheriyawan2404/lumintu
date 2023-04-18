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
    <link rel="stylesheet" href="{{ asset('library/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('library/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('custom-scripts')
    {{--    coba --}}
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
    <script src="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}"></script>


    <script>

    </script>
@endpush
