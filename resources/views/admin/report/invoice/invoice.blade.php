{{-- SetPaper A5 Potrait --}}

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <link rel="stylesheet" href="{{ asset('assets/report/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/report/css/report.css') }}">
</head>

<body>
<table class="header mb-2">
    <thead>
    <tr>
        <td rowspan="4">
            <img src="{{ asset('assets/img/logo2.png') }}" class="head"
                 style="width: 150px; padding-right: 10px;">
        </td>
    </tr>
    <tr>
        <td width="50">
            <p><strong>Email</strong></p>
        </td>
        <td>
            <p>lumintu.laundry123@gmail.com</p>
        </td>
    </tr>
    <tr>
        <td width="50">
            <p><strong>No Telepon</strong></p>
        </td>
        <td>
            <p>+6282110271556</p>
        </td>
    </tr>
    <tr>
        <td width="50">
            <p><strong>Alamat</strong></p>
        </td>
        <td>
            <p>Kampung Baru No. 1A RT.007 RW.003 Dangdang Cisauk Kab. Tangerang,
                Banten.</p>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>

<h6 class="text-center">INVOICE</h6>

<table>
    <tr>
        <th width="50">Nomor Order</th>
        <td width="100">ORD#{{$order->order_number}}</td>
        <th width="40">Alamat</th>
        <td width="100">{{ $order->customer->user_detail->address }}</td>
    </tr>
    <tr>
        <th width="50">Tanggal Order</th>
        <td width="100">{{ $order->created_at }}</td>
        <th width="40">No Telepon</th>
        <td width="100">{{ $order->customer->user_detail->phone_number }}</td>
    </tr>
    <tr>
        <th width="50">Tujuan</th>
        <td width="100">{{ $order->customer->name }}</td>
    </tr>
</table>

<div class="table-responsive mt-2">
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
        @foreach($order->order_details as $data)
            <tr>
                <th scope="row">{{ $data->product_customer->product->name }}</th>
                <td class="text-center">{!! number_format($data->product_customer->price, 2) !!}</td>
                <td class="text-center">{{ $data->qty }}</td>
                <td class="text-center">{!! number_format($data->product_customer->price * $data->qty, 2)!!}</td>
            </tr>
        @endforeach
        <tr>
            <th scope="row" colspan="3" class="text-center">TOTAL</th>
            <th scope="row" class="text-center">{!! number_format($order->total_price, 2) !!}</th>
        </tr>
        </tbody>
    </table>
</div>

<table>
    <tr>
        <th width="50">PJ Penjemputan</th>
        @if($order->pickups)
            <td width="90">{{ $order->pickups->valet->name }}</td>
        @else
            <td width="90">-</td>
        @endif
        <th width="50">PJ Pengantaran</th>
        @if($order->deliveries)
            <td width="90">{{ $order->deliveries->valet->name }}</td>
        @else
            <td width="90">-</td>
        @endif
    </tr>
</table>

<table class="mt-2">
    <tr>
        <th>BUKTI PEMBAYARAN</th>
    </tr>
    <tr>
        <td class="px-4"><img src="{{ asset('assets/img/logo.png') }}" style="height: 80px; width: auto;">
        </td>
        <td class="text-center"><img src="{{ asset('assets/img/logo.png') }}" style="height: 80px; width: auto;">
        </td>
    </tr>
</table>

{{-- <table class="mt-2">
    <tr>
        <th colspan="2">INFO PEMBAYARAN</th>
    </tr>
    <tr>
        <th width="50" class="Justify-content-center">Transfer</th>
        <td width="90">
            <ul>
                <li>817268126 (BCA)</li>
                <li>817268126 (BRI)</li>
            </ul>
        </td>
        <th width="50" class="align-items-center">Contact Person</th>
        <td width="90">
            <ul>
                <li>087839736104 (Thoriq)</li>
                <li>087839736104 (Thoriq)</li>
            </ul>
        </td>
    </tr>
</table> --}}

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
</script>
</body>

</html>
