<x-mail::message>
# Invoice dan hasil transaksi Pemesanan(menyesuaikan)
 
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
        <td>Pemesan</td>
        <td>:</td>
        <td>Agung</td>
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

# Invoice

<x-mail::table>
| No        |    Nama         | Harga       | Jumlah | Subtotal  |
| :--------:| :-------------  | :-----------: | :-----:| :-------- |
| 1         | Bath Math (BM)  | Rp. 1,800   | 1      | Rp. 1,800 |
| 2         | Bath Math (BM)  | Rp. 1,800   | 1      | Rp. 1,800 |

| Total     |
| :--------: |
| Rp. 3,600 |
</x-mail::table>

Tetimakasih,<br>
Laundry Lumintu SIP
</x-mail::message>