<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi Harian</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

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

<body class="A4">
    <section class="sheet padding-10mm">
        <div class="text-center">
            <h2>Laporan Transaksi Harian</h2>
            <h2>CV. LUMINTU SIP</h2>
        </div>

        <div class="mt-4 mb-3">
            <p><strong>Tanggal :</strong> 13 Januari 2023</p>
        </div>

        <table class="table">
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
