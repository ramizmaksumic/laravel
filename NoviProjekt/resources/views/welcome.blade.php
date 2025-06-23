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
    <p class="mb-4">Za prikaz detalja o temperaturama u svim gradovima posjetite sekciju <span class="text-orange-700 font-black"><a href="/prognoza">PROGNOZA</span></a></p>

    @endauth


</div>



@endsection