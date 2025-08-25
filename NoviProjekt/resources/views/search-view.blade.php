@extends('layout')

@section('heading', 'Search city')

@section('main-section')


<div class="row pt-20 mx-auto w-300 gap-3 ">

    <form action="/search" method="POST" class="d-flex">
        @csrf
        <input class="bg-white py-3 px-9 mr-7 rounded-xl outline-none" type="text" name="city" placeholder="Unesite ime grada">
        <button class="bg-blue-700 py-3 px-6 rounded-xl text-white">Pretraži</button>


        <div class="mt-5">

            @if (Session::has(['error', 'message']))

            {{ Session::get('error')}}


            @else

            @endif
        </div>

    </form>




</div>





@endsection