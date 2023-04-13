<x-mail::message>
# Introduction

Order anda dengan nomor {{ $order->order_number }}, statusnya sedang {{ $order->status->value }}
<br>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
