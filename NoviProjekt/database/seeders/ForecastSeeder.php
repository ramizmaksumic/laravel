<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Forecast;

class ForecastSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $cityId = $this->command->ask('Unesite ID grada za prognozu:');



        for ($i = 0; $i < 5; $i++) {

            $weather_type = Forecast::WEATHER[rand(0, 2)];
            $probability = null;

            if ($weather_type == 'rainy' || $weather_type == 'snowy') {
                $probability = rand(1, 100);
            }


            Forecast::create([
                'gradovi_id' => $cityId,
                'temperature' => $faker->numberBetween(-10, 40),
                'date' => now()->addDays($i)->toDateString(),
                'weather_type' => $weather_type,
                'probability' => $probability
            ]);
        }

        $this->command->info('Prognoze su uspješno dodane!');
    }
}
