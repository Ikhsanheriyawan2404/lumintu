<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi Bulanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"--}}
{{--        rel="stylesheet">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <style>
        @page {
            size: A4
        }

        body {
            font-size: 11px;
            font-family: 'PT Serif', serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            border: 1px solid #000000;
        }
    </style>
</head>

<body class="A4 landscape">
    <section class="sheet padding-10mm">
        <div class="text-center">
            <h2>Laporan Transaksi Bulanan</h2>
            <h2>CV. LUMINTU SIP</h2>
        </div>

        <div class="mt-4 mb-3">
            <p><strong>Bulan :</strong> Januari 2023</p>
        </div>

        <table class="table">
            <thead class="text-wrap align-middle">
                <tr>
                    <th rowspan="2">NO.</th>
                    <th rowspan="2">HOTEL</th>
                    <th rowspan="2" width="100">PENDAPATAN</th>
                    <th colspan="2">JUMLAH PAJAK (PPN(2,5% || 2%)/adm)</th>
                    <th rowspan="2" width="100">PENDAPATAN (PAJAK)</th>
                    <th colspan="2">BIAYA LAYANAN (CUSTOMER)</th>
                    <th colspan="2">BIAYA LAYANAN (PERUSAHAAN)</th>
                    <th rowspan="2" width="100">PENDAPATAN (TANPA PAJAK)</th>
                </tr>
                <tr>
                    <th width="60">PERSENTASI</th>
                    <th width="100">JUMLAH</th>
                    <th width="60">PERSENTASI</th>
                    <th width="100">JUMLAH</th>
                    <th width="60">PERSENTASI</th>
                    <th width="100">JUMLAH</th>
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
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
