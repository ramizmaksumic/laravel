@extends('welcome')

@section('content')
<div class="mx-auto max-w-3xl px-4 py-10">
    <div class="rounded-2xl border border-gray-200 bg-slate-500 p-6 text-slate-50 shadow-sm">
        <h1 class="text-2xl font-bold text-gray-50">{{ $shipment->title }}</h1>

        <p class="mt-4 text-gray-50">
            <span class="font-semibold">Ruta:</span>
            {{ $shipment->from_city }}, {{ $shipment->from_country }} →
            {{ $shipment->to_city }}, {{ $shipment->to_country }}
        </p>

        <p class="mt-2 text-gray-50">
            <span class="font-semibold">Cijena:</span> {{ $shipment->price }} KM
        </p>

        <p class="mt-2 text-gray-50">
            <span class="font-semibold">Status:</span> {{ $shipment->status }}
        </p>

        <p class="mt-2 text-gray-50">
            <span class="font-semibold">User:</span> {{ $shipment->user->name ?? 'N/A' }}
        </p>

        @if($shipment->details)
        <div class="mt-4 rounded-xl bg-gray-50 p-4 text-gray-700">
            <p class="font-bold mb-5">Detalji pošiljke</p>
            {{ $shipment->details }}
        </div>
        @endif
        <div class="mt-2 text-gray-700 mt-5 items-center flex">
            <a href="{{ route('shipments.index') }}" class="mt-4 rounded-xl bg-slate-700 p-3 text-sm text-gray-50 text-center font-medium">Idi nazad</a>

        </div>
    </div>

</div>
@endsection