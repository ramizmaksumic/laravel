@extends('welcome')

@section('content')
<div class="mx-auto max-w-5xl px-4 py-10">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Shipments</h1>
        <p class="mt-1 text-sm text-gray-600 flex justify-between">
            Pregled svih pošiljki i njihovih detalja.
            <a href="{{ route('shipments.create') }}" class="text-blue-500 font-bold">Kreiraj pošiljku +</a>
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($shipments as $shipment)
        @php
        $status = $shipment->status;

        $statusClasses = match ($status) {
        'pending' => 'bg-yellow-100 text-yellow-800 ring-yellow-200',
        'in_transit' => 'bg-blue-100 text-blue-800 ring-blue-200',
        'delivered' => 'bg-green-100 text-green-800 ring-green-200',
        'cancelled' => 'bg-red-100 text-red-800 ring-red-200',
        default => 'bg-gray-100 text-gray-700 ring-gray-200',
        };

        $statusLabel = match ($status) {
        'pending' => 'Pending',
        'in_transit' => 'In transit',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled',
        default => strtoupper((string) $status),
        };
        @endphp

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="flex items-start justify-between gap-4">
                <h2 class="text-lg font-semibold text-gray-900">
                    {{ $shipment->title }}
                </h2>

                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 {{ $statusClasses }}">
                    {{ $statusLabel }}
                </span>
            </div>

            <div class="mt-4 space-y-2 text-sm text-gray-700">
                <p>
                    <span class="font-medium text-gray-900">Ruta:</span>
                    {{ $shipment->from_city }}, {{ $shipment->from_country }}
                    <span class="mx-1 text-gray-400">→</span>
                    {{ $shipment->to_city }}, {{ $shipment->to_country }}
                </p>

                <p>
                    <span class="font-medium text-gray-900">Cijena:</span>
                    <span class="font-semibold text-gray-900">{{ $shipment->price }} KM</span>
                </p>

                <p>
                    <span class="font-medium text-gray-900">Korisnik:</span>
                    {{ $shipment->user->name ?? 'N/A' }}
                    <span class="text-gray-500">
                        ({{ $shipment->user->email ?? 'nema email' }})
                    </span>
                </p>
            </div>

            @if (!empty($shipment->details))
            <div class="mt-4 rounded-xl bg-gray-50 p-3 text-sm text-gray-700">
                <p class="line-clamp-3">
                    {{ $shipment->details }}
                </p>
            </div>
            @endif
            <div class="mt-4 rounded-xl bg-gray-200 p-3 text-sm text-gray-700 text-center font-medium">
                <a href="{{ route('shipments.show', $shipment) }}">Vidi pošiljku</a>

            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-5">
        {{ $shipments->links() }}
    </div>
</div>
@endsection