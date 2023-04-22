<x-mail::message>
# Notifikasi Penjemputan
 
Hai, (Nama Valet)! <br>
<br>
Pesanan baru telah masuk, silahkan untuk menjemput pesanan!

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
        <td>Pemesan</td>
        <td>:</td>
        <td>Agung</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>Alamat</td>
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