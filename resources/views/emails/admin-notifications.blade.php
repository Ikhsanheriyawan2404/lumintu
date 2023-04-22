<x-mail::message>
# Notifikasi Pemesanan(menyesuaikan)
 
Hai, (Nama Admin)! <br>
<br>
Pesanan baru telah masuk, silahkan untuk terima pesanan dan memilih valet untuk menjemput!

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