<x-mail::message>
# Invoice dan hasil transaksi Pemesanan(menyesuaikan)

Hai, {{ $order->customer->name }}!

<x-mail::panel>
<table border="0">
    <tr>
        <td>ID Pesanan</td>
        <td>:</td>
        <td>ORD#{{ $order->order_number }}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{ $order->created_at }}</td>
    </tr>
    <tr>
        <td>Valet</td>
        <td>:</td>
        @if($order->status = 'pickup')
        <td>{{ $order->pickups->valet->name }}</td>
        @else
        <td>{{ $order->deliveries->valet->name }}</td>
        @endif
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>{{ $order->status }}</td>
    </tr>
</table>

</x-mail::panel>

<x-mail::button :url="route('orders.index').'/'.$order->id">
View Order
</x-mail::button>

# Invoice

<x-mail::table>
| No        |    Nama         | Harga       | Jumlah | Subtotal  |
| :--------:| :-------------  | :-----------: | :-----:| :---------- |
@foreach($order->order_details as $data )
| {{  $loop->iteration }}         | {{ $data->product_customer->product->name }}  | {{ number_format($data->product_customer->price, 2) }}   | {{ $data->qty }}      | Rp. {{ $data->product_customer->price*$data->qty }} |
@endforeach

| Total     |
| :--------: |
| Rp. {{  number_format($order->total_price, 2) }} |
</x-mail::table>

Tetimakasih,<br>
Laundry Lumintu SIP
</x-mail::message>
