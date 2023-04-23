<x-mail::message>
# Notifikasi {{ ($order->status = 'pickup') ? 'Penjemputan' : 'Pengantran' }}

Hai, {{ ($order->status = 'pickup') ? $order->pickups->valet->name : $order->deliveries()->valet->name }}!<br>
<br>
Pesanan baru telah masuk, silahkan untuk menjemput pesanan!

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
            <td>{{ $order->updated_at }}</td>
        </tr>
        <tr>
            <td>Pemesan</td>
            <td>:</td>
            <td>{{ $order->customer->name }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $order->customer->user_detail->address }}</td>
        </tr>
    </table>
</x-mail::panel>

<x-mail::button :url="route('orders.index').'/'.$order->id">
View Order
</x-mail::button>

Terimakasih,<br>
Laundry Lumintu SIP
</x-mail::message>
