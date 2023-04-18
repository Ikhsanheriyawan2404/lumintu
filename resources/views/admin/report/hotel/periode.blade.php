{{-- SetPaper A4 Landscape --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Periode Hotel'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Periode Hotel Indah</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h2>CV. LUMINTU SIP</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Periode :</strong> 13 Januari - 13 Februari 2023
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Penanggungjawab :</strong> Thoriqul Hafidz Prahanto</td>
                <td class="text-end"><strong>Valet :</strong> Thoriqul Hafidz Prahanto</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-stripped my-2">
        <thead class="text-wrap align-middle">
            <tr>
                <th rowspan="2">NO.</th>
                <th rowspan="2">ITEM</th>
                <th rowspan="2">HARGA</th>
                <th colspan="11">TANGGAL</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <tr>
                <th colspan="3">NO. ORDER</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
                <th>938742934</th>
            </tr>
            <tr>
                <td class="text-center" width="20">1</td>
                <td>Sheet King</td>
                <td class="text-center">Rp. 2.200</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Table Cloth / Multon</td>
                <td class="text-center">Rp. 5.000</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
                <td class="text-center">4</td>
            </tr>
            <tr>
                <td class="text-center" width="20">3</td>
                <td>Sheet King</td>
                <td class="text-center">Rp. 2.200</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
                <td class="text-center">48</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Sub Kuantitas</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
                <th class="text-center">100</th>
            </tr>
            <tr>
                <th colspan="3">Sub Total Harga</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
                <th class="text-center">Rp. 300.000</th>
            </tr>
            <tr>
                <th colspan="3" style="background-color: yellow;">Grand Total</th>
                <th colspan="11" class="text-center" style="background-color: yellow;">Rp. 11.011.200</th>
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

@push('custom-style')
    <style>
        .content {
            width: 100%;
            margin-top: 0;
            box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.15);
            height: 17cm;
            backdrop-filter: blur(20px);
        }
    </style>
@endpush
