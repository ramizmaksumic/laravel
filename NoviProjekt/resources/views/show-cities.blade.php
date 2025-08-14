@extends('layout')

@section('heading', 'Search city')

@section('main-section')


<div class="row pt-20 mx-auto w-300 gap-3 ">

    <form action="/search" method="POST" class="d-flex">
        @csrf
        <input class="bg-white py-3 px-9 mr-7 rounded-xl outline-none" type="text" name="city" placeholder="Unesite ime grada">
        <button class="bg-blue-700 py-3 px-6 rounded-xl text-white">Pretraži</button>

        <div class="mt-5">

            @if (Session::has("error"))
            {{ Session::get('error') }}
            @else
            <div class="flex md:flex-row flex-wrap gap-4 mt-8">
                @foreach ($cities as $city)
                @php
                $latestForecast = $city->forecasts->sortByDesc('date')->first();
                $icon = '';

                if ($latestForecast) {
                $icon = match($latestForecast->weather_type) {
                'sunny' => 'fa-sun',
                'rainy' => 'fa-cloud-showers-heavy',
                'snowy' => 'fa-snowflake',
                'cloudy' => 'fa-cloud',
                default => 'fa-question'
                };
                }


                @endphp

                @if (in_array($city->id, $userCities))
                <a class="bg-blue-700 py-2 px-4 rounded-xl text-yellow-200 flex items-center" href="{{ route('delete.favourites', ['city'=> $city->id]) }}"><i class="fa-solid fa-heart"></i></a>

                @else

                <a class="bg-blue-700 py-2 px-4 rounded-xl text-white flex items-center" href="{{ route('user.favourites', ['city'=> $city->id]) }}"><i class=" fa-regular fa-heart"></i></a>

                @endif



                <a class="bg-blue-700 py-2 px-4 rounded-xl text-white flex items-center" href="">

                    <i class="fa-solid text-yellow-200 {{ $icon }}"></i>
                    {{ $city->name }}
                </a>
                @endforeach



            </div>
            @endif

        </div>


</div>

</form>



</div>





@endsection