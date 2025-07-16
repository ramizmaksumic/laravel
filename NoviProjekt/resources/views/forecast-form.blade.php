<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Weather</title>
</head>

<body>

    <form action="/" method="POST">
        @csrf
        <input type="text" name="temperature" placeholder="Molimo unesite temperaturu">
        <select name="city_id">
            @foreach (\App\Models\City::all() as $city )
            <option value="{{ $city->id }}">{{ $city->name }}</option>

            @endforeach
        </select>

        <input type="submit" value="Snimi">

    </form>

    <div>

        @foreach (\App\Models\Weather::all() as $weather )

        <p>{{ $weather->city->name }} - {{ $weather->temperature }}</p>

        @endforeach

    </div>



</body>

</html>