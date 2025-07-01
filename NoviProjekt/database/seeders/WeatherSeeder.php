<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cityId = $this->command->getOutput()->ask('Koji ID želite da unesete?');
        $temperature = $this->command->getOutput()->ask('Koja je trenutna temperatura?');

        Weather::create([
            'gradovi_id' => $cityId,
            'temperature' => $temperature
        ]);

        $this->command->info('Prognoza je uspješno dodana!');
    }
}
