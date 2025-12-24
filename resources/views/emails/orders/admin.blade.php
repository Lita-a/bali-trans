@component('mail::message')
# Pesanan Baru

Anda menerima pesanan baru dari {{ $order->customer_name }}.

**Total Pembayaran:** Rp {{ number_format($order->total_price,0,',','.') }}

**Detail Pesanan:**
@foreach ($order->items as $item)
- {{ $item->car_name }} ({{ $item->days }} hari) - Rp {{ number_format($item->subtotal,0,',','.') }}
@endforeach

@component('mail::button', ['url' => route('admin.carts.index')])
Lihat Pesanan di Dashboard
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
