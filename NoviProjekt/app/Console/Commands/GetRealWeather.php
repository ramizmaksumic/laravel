<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {



        $apiKey = env('WEATHER_API_KEY');

        $url = "http://api.weatherapi.com/v1/current.json";
        $response = Http::get($url, [
            "key" => $apiKey,
            "q" => 'Mostar',

        ]);

        $jsonResponse = $response->json();

        dd($jsonResponse['location']['name'] . ', ' . $jsonResponse['current']['temp_c']);
    }
}
