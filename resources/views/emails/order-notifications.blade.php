<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Notifikasi Pesanan</h1>
    <p>Order anda dengan nomor {{ $order->order_number }}, statusnya sedang {{ $order->status->value }}</p>

    <a href="#" class="btn">Lihat Pesanan</a>


</body>

</html>
