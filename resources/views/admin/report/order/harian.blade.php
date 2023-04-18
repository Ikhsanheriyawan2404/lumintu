{{-- SetPaper A4 Potrait --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Harian Transaksi'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Harian Transaksi</h2>
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
                <td><strong>Penanggungjawab :</strong> Thoriqul Hafidz Prahanto</td>
                <td class="text-end"><strong>Tanggal :</strong> 13 Januari 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-stripped my-2">
        <thead>
            <tr>
                <th>NO.</th>
                <th>HOTEL</th>
                <th>PENDAPATAN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" width="20">1</td>
                <td>Hotel Alam Sari</td>
                <td class="text-center">Rp. 200.000</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Hotel Indah</td>
                <td class="text-center">Rp. 130.000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th class="text-center">Rp. 330.000</th>
            </tr>
        </tfoot>
    </table>

    <div class="">
        <p class="h6">Catatan:</p>
        <ul class="text-justify">
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam nobis voluptatem vel numquam voluptas
                vero veritatis aut molestias laborum autem.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit dolorem culpa eos quos assumenda.
                Iste sed, non nam tempora beatae dolorem similique unde, doloribus mollitia eligendi sit quos
                architecto eveniet?</li>
        </ul>
    </div>
@endsection
