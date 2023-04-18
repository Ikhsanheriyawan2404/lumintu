{{-- SetPaper A4 Potrait --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Harian Hotel'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Harian Hotel Indah</h2>
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
            <tr>
                <td><strong>Valet :</strong> Thoriqul Hafidz Prahanto</td>
                <td class="text-end"><strong>No Order :</strong> ORD-1239821376</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-stripped my-2">
        <thead class="text-wrap align-middle">
            <tr>
                <th>NO.</th>
                <th>ITEM</th>
                <th>HARGA</th>
                <th>KUANTITAS</th>
                <th>SUB TOTAL</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <tr>
                <td class="text-center" width="20">1</td>
                <td>Sheet King</td>
                <td class="text-center">Rp. 2.200</td>
                <td class="text-center">48</td>
                <td class="text-center">Rp. 105.600</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Table Cloth / Multon</td>
                <td class="text-center">Rp. 5.000</td>
                <td class="text-center">4</td>
                <td class="text-center">Rp. 20.000</td>
            </tr>
            <tr>
                <td class="text-center" width="20">3</td>
                <td>Duve Cover Twin</td>
                <td class="text-center">Rp. 4.000</td>
                <td class="text-center">30</td>
                <td class="text-center">Rp. 120.000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Grand Total</th>
                <th class="text-center">Rp. 245.600</th>
            </tr>
        </tfoot>
    </table>

    <div class="mt-3">
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
