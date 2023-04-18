{{-- SetPaper A4 Potrait --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Harian Valet'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Harian Valet</h2>
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
                <td class="text-end"><strong>Tanggal :</strong> 13 Januari 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped my-2">
        <thead>
            <tr>
                <th class="text-center">NO.</th>
                <th class="text-center">HOTEL</th>
                <th class="text-center">NO ORDER</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" width="20">1</td>
                <td>Hotel Indah</td>
                <td class="text-center">ORD-1294871398</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Hotel Alam Indah</td>
                <td class="text-center">ORD-1294871398</td>
            </tr>
            <tr>
                <td class="text-center" width="20">3</td>
                <td>Hotel Indah Alam</td>
                <td class="text-center">ORD-1294871398</td>
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
