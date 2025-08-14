@extends('layout')

@section('heading', 'Home')

@section('main-section')


<div class="row pt-20 mx-auto w-300 gap-3 ">

    @guest

    <p class="mb-4">Za prikaz detalja o temperaturama u svim gradovima posjetite sekciju <span class="text-orange-700 font-black"><a href="/prognoza">PROGNOZA</span></a></p>
    <p>Ukoliko niste registrirani korisnik molimo da to učinite ovdje: <a class="font-bold text-blue-600" href="/register">Register, </a>
        <br>ili ako ste već imate profil potrebno je da se logirate ovdje: <a class="font-bold text-blue-600" href="/login">Login </a>
    </p>
    @endguest

    @auth

    @if($favourites->isEmpty())
    <p>Nemate nijedan omiljeni grad.</p>
    @else
    <div class="mb-5">

        <h3 class="text-xl font-bold">Favourites</h3>
    </div>
    <div class="flex  gap-4 flex-wrap mb-5">

        @foreach($favourites as $city)
        <div class="p-4 bg-blue-500 rounded">
            <h3 class="text-white">{{ $city->name }}</h3>
            @php
            $latest = $city->forecasts->sortByDesc('date')->first();
            @endphp
            @if($latest)
            <p class="text-white">{{ $latest->temperature }}°C - <i class="fa {{ $latest->weather_icon }} "></i></p>
            @endif
        </div>
        @endforeach
    </div>
    @endif


    <p class="mb-4">Za prikaz detalja o temperaturama u svim gradovima posjetite sekciju <span class="text-orange-700 font-black"><a href="/prognoza">PROGNOZA</span></a></p>

    @endauth


</div>



@endsection