<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\Null_;

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

        // $url = "https://kurs.resenje.org/api/v1/currencies/usd/rates/today;

        $currencies = ["USD", "EUR"];

        foreach ($currencies as $currency) {
            $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");
            $created_at = ExchangeRates::where('curency', $currency)
                ->whereDate('created_at', Carbon::now())
                ->first();

            if ($created_at !== null) {

                continue;
            } else {
                ExchangeRates::create([
                    'curency' => $currency,
                    'value' => $response->json()['exchange_middle']
                ]);
            }
        }
    }
}
