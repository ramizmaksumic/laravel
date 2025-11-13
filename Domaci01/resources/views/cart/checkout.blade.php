@extends('layout')

@section("heading")

<?php $heading = "Vidi detalje kupovine";
echo $heading; ?>
@endsection


@section('glavnastranica')

<h2 class="font-bold">Vaša korpa izgleda ovako:</h2>



@if(session('cart'))
<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="text-left py-3 px-4 font-medium text-gray-700">Naziv</th>
                <th class="text-center py-3 px-4 font-medium text-gray-700">Količina</th>
                <th class="text-center py-3 px-4 font-medium text-gray-700">Cijena</th>
                <th class="text-center py-3 px-4 font-medium text-gray-700">Ukupno</th>

            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach(session('cart') as $details)
            <tr class="hover:bg-gray-50 transition">
                <td class="py-3 px-4 text-gray-800 font-medium flex items-center space-x-3">
                    @if($details['image'])
                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="w-12 h-12 object-cover rounded-md border">
                    @endif
                    <span>{{ $details['name'] }}</span>
                </td>
                <td class="text-center py-3 px-4 text-gray-700">{{ $details['quantity'] }}</td>
                <td class="text-center py-3 px-4 text-gray-700">{{ number_format($details['price'], 2) }} KM</td>
                <td class="text-center py-3 px-4 text-gray-800 font-semibold">
                    {{ number_format($details['price'] * $details['quantity'], 2) }} KM
                </td>

            </tr>
            @endforeach
        </tbody>
        <tfoot class="bg-gray-100">
            <tr>
                <td colspan="3" class="text-right py-3 px-4 font-semibold text-gray-800">Ukupno:</td>
                <td colspan="2" class="text-center py-3 px-4 font-bold text-green-600">
                    {{ number_format(collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']), 2) }} KM
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="mt-6 flex justify-end">
    <a href="#" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold">
        Nastavi na plaćanje
    </a>
</div>
@else
<div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-6 py-4 rounded-lg">
    Korpa je trenutno prazna.
</div>
@endif



@endsection