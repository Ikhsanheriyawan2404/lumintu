{{-- SetPaper A4 Landscape --}}

@extends('admin.pdf.layouts.app', ['title' => 'Laporan Periode Transaksi'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Periode Transaksi</h2>
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
                <td class="text-end"><strong>Periode :</strong> 13 Januari - 13 Februari 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-stripped my-2">
        <thead class="text-wrap align-middle">
            <tr>
                <th rowspan="2">NO.</th>
                <th rowspan="2">HOTEL</th>
                <th rowspan="2" width="70">PENDAPATAN</th>
                <th colspan="2">JUMLAH PAJAK (PPN(2,5% || 2%)/adm)</th>
                <th rowspan="2" width="70">PENDAPATAN (PAJAK)</th>
                <th colspan="2">BIAYA LAYANAN (CUSTOMER)</th>
                <th colspan="2">BIAYA LAYANAN (PERUSAHAAN)</th>
                <th rowspan="2" width="70">PENDAPATAN (TANPA PAJAK)</th>
            </tr>
            <tr>
                <th width="60">PERSENTASI</th>
                <th width="60">JUMLAH</th>
                <th width="60">PERSENTASI</th>
                <th width="60">JUMLAH</th>
                <th width="60">PERSENTASI</th>
                <th width="60">JUMLAH</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <tr>
                <td class="text-center" width="20">1</td>
                <td>Hotel Alam Sari</td>
                <td class="text-center">Rp. 4.698.050</td>
                <td class="text-center">2%</td>
                <td class="text-center">Rp. 93.961</td>
                <td class="text-center">Rp. 4.698.050</td>
                <td class="text-center">10%</td>
                <td class="text-center">Rp. 460.408.90</td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td class="text-center">Rp. 4.604.089</td>
            </tr>
            <tr>
                <td class="text-center" width="20">2</td>
                <td>Hotel Indah</td>
                <td class="text-center">Rp. 3.208.400</td>
                <td class="text-center">2.5%</td>
                <td class="text-center">Rp. 80.210</td>
                <td class="text-center">Rp. 3.208.400</td>
                <td class="text-center">31.97%</td>
                <td class="text-center">Rp. 1.000.000</td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td class="text-center">Rp. 3.128.190</td>
            </tr>
            <tr>
                <td class="text-center" width="20">3</td>
                <td>Hotel Raya</td>
                <td class="text-center">Rp. 3.104.750</td>
                <td class="text-center">2%</td>
                <td class="text-center">Rp. 62.095</td>
                <td class="text-center">Rp. 3.104.750</td>
                <td class="text-center">7%</td>
                <td class="text-center">Rp. 212.985.85</td>
                <td class="text-center">3%</td>
                <td class="text-center">Rp. 91.279.65</td>
                <td class="text-center">Rp. 3.042.655</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th class="text-center">Rp. 11.011.200</th>
                <th class="text-center" colspan="2"></th>
                <th class="text-center">Rp. 11.011.200</th>
                <th class="text-center"></th>
                <th class="text-center">Rp. 1.673.394.75</th>
                <th class="text-center"></th>
                <th class="text-center">Rp. 91.279.65</th>
                <th class="text-center">Rp. 10.774.934</th>
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
            backdrop-filter: blur(10px);
        }
    </style>
@endpush
