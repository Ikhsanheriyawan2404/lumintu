<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengeluaran Bulanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> --}}

    <style>
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

        .page-header,
        .page-header-space {
            height: 100px;
        }

        .page-footer,
        .page-footer-space {
            height: 50px;

        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid black;
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 1px solid black;
            background: white;
        }

        .page {
            page-break-after: always;
        }

        .content {
            width: 100%;
            margin-top: 0;
        }

        @media print {
            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            button {
                display: none;
            }

            body {
                margin: 0;
                font-size: 9px;
                font-family: 'PT Serif', serif;
            }
        }
    </style>
</head>

<body>
    <div class="page-header" style="text-align: center">
        <div class="text-center">
            <h2>Laporan Pengeluaran Bulanan</h2>
            <h2>CV. LUMINTU SIP</h2>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <p><strong>Penanggungjawab :</strong> Thoriqul Hafidz Prahanto</p>
            <p><strong>Tanggal :</strong> 13 Januari 2023</p>
        </div>
        {{-- <button type="button" onClick="window.print()" style="background: pink">
            PRINT ME!
        </button> --}}
    </div>

    <table class="content">

        <thead>
            <tr>
                <td>
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                </tr>
                                <tr>
                                    <th style="background-color: yellow;">GRAND TOTAL</th>
                                    <th colspan="20" style="background-color: yellow;">Rp. 2.800.000</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-3">
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
                </td>
            </tr>
        </tbody>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
