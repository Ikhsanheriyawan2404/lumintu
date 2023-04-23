<x-mail::message>
# Notifikasi Pemesanan
{{--    (menyesuaikan)--}}

{{--Hai, (Nama Admin)! <br>--}}
<br>
Pesanan baru telah masuk, silahkan untuk terima pesanan dan memilih valet untuk menjemput!

<x-mail::panel>
<table border="0">
    <tr>
        <td>ID Pesanan</td>
        <td>:</td>
        <td>ORD#{{$order->order_number}}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{ $order->created_at }}</td>
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
{{--    <tr>--}}
{{--        <td>Status</td>--}}
{{--        <td>:</td>--}}
{{--        <td>Pemesanan</td>--}}
{{--    </tr>--}}
</table>

</x-mail::panel>

<x-mail::button :url="route('orders.index').'/'.$order->id">
View Order
</x-mail::button>

Terimakasih,<br>
Laundry Lumintu SIP
</x-mail::message>
