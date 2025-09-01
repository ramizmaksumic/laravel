<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class MoneyExchange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:money-exchange';

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
        // Freecurrencyapi.com
        // Bazni kurs je dolar

        $url = "https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_kzZGNlpGBCY2b7mlpHAtvz4wo740l8TnLLXeMqsD&currencies=EUR%2CUSD";
        $response = Http::get($url);

        $jsonResponse = $response->json();

        $dolar = $jsonResponse['data']["USD"];
        $euro = $jsonResponse['data']["EUR"];

        dd("Za 1\$ dobijate" . $euro . " €, na dan " . date('l jS \of F Y h:i:s A'));
    }
}
