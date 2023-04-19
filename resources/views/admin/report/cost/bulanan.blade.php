{{-- SetPaper A4 Landscape --}}

@extends('admin.report.layouts.app', ['title' => 'Laporan Bulanan Pengeluaran'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Bulanan Pengeluaran</h2>
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
                <td class="text-end"><strong>Bulan :</strong> Januari 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped my-2">
        <thead class="text-wrap align-middle">
            <tr>
                <th width="20" rowspan="2">TGL</th>
                <th width="30" rowspan="2">KAYU</th>
                <th width="30" colspan="8">BENSIN</th>
                <th width="30" rowspan="2">E-TOL (JALUR KOTA 2 MOBIL)</th>
                <th width="30" rowspan="2">PARKIR KYRIAD</th>
                <th width="30" rowspan="2">LISTRIK</th>
                <th width="30" rowspan="2">PULSA HP KANTOR</th>
                <th width="30" rowspan="2">PARFUM</th>
                <th width="30" rowspan="2">HANGER</th>
                <th width="30" rowspan="2">PLASTIK</th>
                <th width="30" rowspan="2">CAMICHAL</th>
                <th width="30" rowspan="2">SERVICE MESIN/KENDARAAN</th>
                <th width="30" rowspan="2">ALAT MESIN/ATK</th>
                <th width="30" rowspan="2">LAIN LAIN</th>
                <th width="30" rowspan="2">TOTAL GAJI</th>
            </tr>
            <tr>
                <th width="30">HANGKEL</th>
                <th width="30">B 9149 UCT</th>
                <th width="30">B 9153 UCT</th>
                <th width="30">B 9877 UCS</th>
                <th width="30">B 9980 VCA</th>
                <th width="30">B 9354 SCH</th>
                <th width="30">B 9828 BCU</th>
                <th width="30">MOTOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" width="20">1</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">0</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">70.000</td>
                <td class="text-center">0</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Sub Total</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <th class="text-center">140.000</th>
                <td class="text-center">0</td>
            </tr>
            <tr>
                <th style="background-color: yellow;">GRAND TOTAL</th>
                <th colspan="21" style="background-color: yellow;">Rp. 2.800.000</th>
            </tr>
        </tfoot>
    </table>
    <div class="">
        <p class="h6">Catatan:</p>
        <ul class="text-justify">
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam nobis voluptatem vel
                numquam voluptas
                vero veritatis aut molestias laborum autem.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit dolorem culpa eos quos
                assumenda.
                Iste sed, non nam tempora beatae dolorem similique unde, doloribus mollitia eligendi sit
                quos
                architecto eveniet?</li>
        </ul>
    </div>
@endsection

@push('custom-style')
    <style>
        body {
            font-size: 9px;
        }

        .content {
            width: 100%;
            margin-top: 0;
            box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.15);
            height: 17cm;
            backdrop-filter: blur(10px);
        }
    </style>
@endpush
