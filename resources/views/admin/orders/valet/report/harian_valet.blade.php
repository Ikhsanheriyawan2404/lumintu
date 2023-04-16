<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Harian Valet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"--}}
        rel="stylesheet">
    <style>
        body {
            font-size: 11px;
            /*font-family: 'PT Serif', serif;*/
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
            }
        }
    </style>
</head>

<body>

    <div class="page-header" style="text-align: center">
        <div class="text-center">
            <h2>Laporan Harian Valet</h2>
            <h2>CV. LUMINTU SIP</h2>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <p><strong>Nama Valet :</strong> Thoriqul Hafidz Prahanto</p>
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
                    <table class="table table-striped my-4">
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
                                <td>Hotel Alam Sari</td>
                                <td class="text-center">ORD-1294871398</td>
                            </tr>
                            <tr>
                                <td class="text-center" width="20">3</td>
                                <td>Hotel Alam Indah</td>
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
                </td>
            </tr>
        </tbody>

    </table>

</body>

</html>
