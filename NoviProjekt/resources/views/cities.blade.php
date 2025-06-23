@extends('layout')

@section('heading', 'Home')

@section('main-section')

<div class="row flex grid-cols-4 justify-between pt-20 mx-auto w-300 gap-3 ">
    <h3 class="text-xl font-bold bg-blue-500 text-white px-4 py-2 rounded-xl"><a href="/add-cities">Unesi novi grad</a> <span>+</span></h3>
</div>
<div class="row flex grid-cols-4 justify-between pt-20 mx-auto w-300 gap-3 ">

    @foreach ($cities as $citie )

    <div class="card bg-white py-5 pt-0 rounded-xl">
        <img class="w-full h-48 object-cover rounded-xl" src="{{ asset('images/Mostar.jpg') }}" alt="">
        <div class="info flex justify-between mt-2 px-2">
            <h2 class="font-bold text-2xl py-2">{{ $citie->name }}</h2>
            <p class="font-bold bg-yellow-300 px-2 py-1 rounded-xl">{{$citie->deg}} C</p>

        </div>
        <p class="px-2">{{$citie->description}}</p>
        <button class="px-5 py-2 bg-blue-300 rounded-xl mt-5 ml-2 font-bold">Detaljnije...</button>
    </div>
    @endforeach



</div>


@endsection