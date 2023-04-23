<x-mail::message>
# Notifikasi Pemesanan(menyesuaikan)

Hai, (Nama Pemesan)!

<x-mail::panel>
<table border="0">
    <tr>
        <td>ID Pesanan</td>
        <td>:</td>
        <td>123123</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Valet</td>
        <td>:</td>
        <td>Valet</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>Pemesanan</td>
    </tr>
</table>

</x-mail::panel>

<x-mail::button :url="''">
View Order
</x-mail::button>

Terimakasih,<br>
Laundry Lumintu SIP
</x-mail::message>
