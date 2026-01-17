<h1 class="text-2xl font-semibold mb-4">Hvala na kupovini!</h1>

<p>Vaša narudžba #{{ $order->id }} je uspješno zaprimljena.</p>
<p>Ukupno: <strong>{{ number_format($order->total_price, 2) }} KM</strong></p>