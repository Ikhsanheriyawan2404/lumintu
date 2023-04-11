@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Price List User Hotel</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <table class="table" id="productcustomer-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Price</th>
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
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/Editor-2023-04-24-2.1.2/css/editor.dataTables.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/admin/plugins/Editor-2023-04-24-2.1.2/js/dataTables.editor.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        var editor;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(document).ready(function() {
            editor = new $.fn.dataTable.Editor({
                ajax: "{{ route('hotel.price-list', $userId) }}",
                table: "#productcustomer-table",
                method: "POST",
                idSrc:  'id',
                fields: [{label: "Harga", name: "price"}],
            });


            // Activate an inline edit on click of a table cell
            $('#productcustomer-table').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });

            $('#productcustomer-table').on( 'click', 'tbody ul.dtr-details li', function (e) {
                // Edit the value, but this selector allows clicking on label as well
                editor.inline( $('span.dtr-data', this) );
            } );

            var dataTable = $('#productcustomer-table').DataTable( {
                dom: "Bfrtip",
                ajax: {
                    url: "{{ route('hotel.price-list', $userId) }}",
                    type: 'POST'
                },
                order: [[ 1, 'asc' ]],
                serverSide:true,
                processing:true,
                responsive: true,
                columns: [
                    { data: "DT_RowIndex" },
                    { data: "product.name" },
                    { data: "price", render: $.fn.dataTable.render.number( '.', ',', 0 ) }
                ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
            });
        });
    </script>

@endpush
