{{-- SetPaper A4 Potrait --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Bulanan Valet'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Bulanan Valet</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h2>CV. LUMINTU SIP</h2>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Nama Valet :</strong> Thoriqul Hafidz Prahanto</td>
                <td class="text-end"><strong>Bulan :</strong> Januari 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped my-2">
        <thead>
            <tr class="text-center">
                <th>NO.</th>
                <th>HOTEL</th>
                <th>NO ORDER</th>
                <th>TANGGAL ORDER</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" width="20">1
                </td>
                <td>Hotel Indah</td>
                <td class="text-center">ORD-1294871398</td>
                <td class="text-center">13 Januari 2023</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Hotel Alam Sari</td>
                <td class="text-center">ORD-1294871398</td>
                <td class="text-center">14 Januari 2023</td>
            </tr>
            <tr>
                <td class="text-center" width="20">3</td>
                <td>Hotel Alam Indah</td>
                <td class="text-center">ORD-1294871398</td>
                <td class="text-center">15 Januari 2023</td>
            </tr>
        </tbody>
        {{-- <tfoot>
        <tr>
            <th colspan="2">Total Hotel</th>
            <th class="text-center">3</th>
        </tr>
    </tfoot> --}}
    </table>
@endsection
