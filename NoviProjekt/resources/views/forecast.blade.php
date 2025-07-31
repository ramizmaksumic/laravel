<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <title>Forecast</title>
</head>

<body>
    <div class=" p-3 flex flex-col">

        <form class="m-3" action="{{ route('update-forecast') }}" method="POST">
            @csrf

            <h2>Kreiranje novog forcesta</h2>

            <div class="mb-3">
                <select name="city_id" class="form-control">
                    @foreach (\App\Models\City::all() as $city )
                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                    @endforeach
                </select>

            </div>
            <div class="mb-3">

                <input class="form-control" type="text" name="temperature" placeholder="Unesite temperaturu">
            </div>
            <!-- <div class="mb-3">
                <select class="form-control" name="weather_type">
                    <option value="rainy">rainy</option>
                    <option value="snowy">snowy</option>
                    <option value="sunny">sunny</option>
                    <option value="cloudy">cloudy</option>
                </select>

            </div> -->

            <div class="mb-3">
                <input class="form-control" type="text" name="probability" placeholder="Unesite šansu za padavine">

            </div>

            <div class="mb-3">
                <input class="form-control" type="date" name="date">

            </div>

            <button class="btn btn-primary">Snimi podatke</button>


        </form>
    </div>

    <div class="d-flex flex-wrap px-3">



        @foreach (\App\Models\City::all() as $city)
        <div style="margin-bottom: 20px;" class="flex-row">
            <p class="mb-1">{{ $city->name }}</p>

            @foreach ($city->forecasts as $forecast)

            <ul class="list-group me-2">

                @php



                $boja;

                if($forecast->temperature <= 0)
                    {
                    $boja="lightblue" ;
                    } elseif ($forecast->temperature >= 1 && $forecast->temperature <= 15) {
                        $boja="blue" ;
                        } elseif ($forecast->temperature > 15 && $forecast->temperature <= 25) {
                            $boja="green" ;
                            } else {
                            $boja="red" ;
                            }

                            @endphp

                            <li class="list-group-item">

                            <span>
                                {{ $forecast->date }} -

                                @if ($forecast->shouldShowTemperature())
                                <span style="color: {{ $forecast->color }}">{{ $forecast->temperature }}°</span>
                                @endif

                                @if ($forecast->weather_icon)
                                <i class="fa-solid {{ $forecast->weather_icon }}"></i>
                                @endif

                            </span>



                            </li>
            </ul>
            @endforeach
        </div>
        @endforeach

    </div>

</body>

</html>