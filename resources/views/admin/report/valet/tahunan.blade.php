{{-- SetPaper A4 Potrait --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Tahunan Valet'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Tahunan Valet</h2>
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
                <td class="text-end"><strong>Tahun :</strong> 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped my-2">
        <thead>
            <tr>
                <th class="text-center">NO.</th>
                <th class="text-center">BULAN</th>
                <th class="text-center">TOTAL ORDER</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" width="20">1</td>
                <td>Januari</td>
                <td class="text-center">5</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Februari</td>
                <td class="text-center">5</td>
            </tr>
            <tr>
                <td class="text-center" width="20">3</td>
                <td>Maret</td>
                <td class="text-center">5</td>
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
