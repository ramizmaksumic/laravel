<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forecast</title>
</head>

<body>

    <form action="{{ route('update-forecast') }}" method="POST">
        @csrf

        <select name="city_id">
            @foreach (\App\Models\City::all() as $city )
            <option value="{{ $city->id }}">{{ $city->name }}</option>

            @endforeach
        </select>
        <input type="text" name="temperature" placeholder="Unesite temperaturu">
        <select name="weather_type">
            <option value="rainy">rainy</option>
            <option value="snowy">snowy</option>
            <option value="sunny">sunny</option>
        </select>
        <input type="text" name="probability" placeholder="Unesite šansu za padavine">
        <input type="date" name="date">

        <button>Snimi podatke</button>


    </form>

    <div>



        @foreach (\App\Models\City::all() as $city)
        <div style="margin-bottom: 20px;">
            <h4>{{ $city->name }}</h4>

            @foreach ($city->forecasts as $forecast)

            <ul>

                <li>
                    {{ $forecast->date }} - {{ $forecast->temperature }}°

                </li>
            </ul>
            @endforeach
        </div>
        @endforeach

    </div>

</body>

</html>