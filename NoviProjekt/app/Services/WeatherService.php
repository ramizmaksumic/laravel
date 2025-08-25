<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getForecast(string $city, $days = 5): ?array
    {
        $apiKey = env('WEATHER_API_KEY');

        $url = "http://api.weatherapi.com/v1/forecast.json";
        $response = Http::get($url, [
            "key" => $apiKey,
            "q"   => $city,
            "days" => $days
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}
