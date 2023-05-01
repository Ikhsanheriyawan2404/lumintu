<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{--    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"--}}
    {{--          rel="stylesheet">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <style>
        @page {
            size: A5
        }

        body {
            font-size: 9px;
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

        .padding {
            padding: 5mm;
        }
    </style>
</head>

<body class="A5">
<section class="sheet padding">
    <div class="row">
        <div class="col-3">
            <img src="{{ asset('assets/img/logo2.png') }}" class="img-fluid rounded-start p-2">
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-5 ps-3">
                    <div class="row mb-2">
                        <h6 class="card-title">Email</h6>
                        <p class="card-text">lumintu.laundry123@gmail.com</p>
                    </div>
                    <div class="row">
                        <h6 class="card-title">No Telepon</h6>
                        <p class="card-text">+6282110271556</p>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row mb-2">
                        <h6 class="card-title">Alamat</h6>
                        <p class="card-text">Kampung Baru No. 1A RT.007 RW.003 Dangdang Cisauk Kab. Tangerang,
                            Banten.
                        </p>
                    </div>
                    {{-- <div class="row">
                        <h6 class="card-title">Website</h6>
                        <p class="card-text">lumintusip.com</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row">
        <div class="ps-4">
            <h4 class="fw-bold">INVOICE</h4>
        </div>
        <div class="pe-4 ps-4 flex-grow-1">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="row mb-2">
                <div class="col-5">
                    <p class="fw-bold card-title">Nomor Order</p>
                </div>
                <div class="col-7">
                    <p class="card-text">ORD-643542532432</p>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-5">
                    <p class="fw-bold card-title">Tanggal Order</p>
                </div>
                <div class="col-7">
                    <p class="card-text">12 Januari 2023</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p class="fw-bold card-title">Tujuan</p>
                </div>
                <div class="col-7">
                    <p class="card-text">Hotel Alam Sari</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row mb-2">
                <div class="col-4">
                    <p class="fw-bold">Alamat</p>
                </div>
                <div class="col-8">
                    <p class="card-text">Kampung Baru No. 1A RT.007 RW.003 Dangdang Cisauk Kab. Tangerang, Banten.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Nomor Telepon</p>
                </div>
                <div class="col-8">
                    <p class="card-text">+6287839736104</p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">ITEM</th>
                <th class="text-center">HARGA</th>
                <th class="text-center">KUANTITI</th>
                <th class="text-center">SUB TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Apron</th>
                <td class="text-center">4.000</td>
                <td class="text-center">3</td>
                <td class="text-center">12.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row">Food & Beverage</th>
                <td class="text-center">7.000</td>
                <td class="text-center">5</td>
                <td class="text-center">35.000</td>
            </tr>
            <tr>
                <th scope="row" colspan="3" class="text-center">TOTAL</th>
                <th scope="row" class="text-center">47.000</th>
            </tr>
            </tbody>
        </table>
    </div>

    {{-- <div class="mt-0">
        <p class="h6 lh-1">Catatan:</p>
        <ul class="text-justify">
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam nobis voluptatem vel numquam voluptas
                vero veritatis aut molestias laborum autem.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit dolorem culpa eos quos assumenda.
                Iste sed, non nam tempora beatae dolorem similique unde, doloribus mollitia eligendi sit quos
                architecto eveniet?</li>
        </ul>
    </div> --}}

    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-5">
                    <p class="fw-bold">Valet</p>
                </div>
                <div class="col-7">
                    Valet2
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-5">
                    <p class="fw-bold">Penerima</p>
                </div>
                <div class="col-7">
                    Thoriqul Hafidz Prahanto
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <p class="h6">
                INFO PEMBAYARAN
            </p>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold lh-1">Transfer</p>
                </div>
                <div class="col-8">
                    <ul>
                        <li>817268126 (BCA)</li>
                        <li>817268126 (BRI)</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold lh-1">Contact Person</p>
                </div>
                <div class="col-8">
                    <ul>
                        <li>087839736104 (Thoriq)</li>
                        <li>087839736104 (Thoriq)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row justify-content-center">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid rounded-start"
                     style="height: 80px; width: auto;">
            </div>
            <div class="row">
                <h4 class="card-title text-center">CV. Lumintu SIP</h4>
            </div>
        </div>
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
