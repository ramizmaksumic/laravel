<?php

namespace Database\Seeders;

use App\Models\Citie;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $city = $this->command->getOutput()->ask('Koji grad želite da unesete?', 'Mostar');
        $deg = $this->command->getOutput()->ask('Koliku temperaturu želite da upišete?', 30);
        $description = $this->command->getOutput()->ask('Unesite detaljan opis', 'Vrijeme je ok');


        if (!Citie::where('name', $city)->exists()) {

            Citie::create([
                'name' => $city,
                'deg' => $deg,
                'description' => $description

            ]);

            $this->command->getOutput()->info('Uspješno ste dodali novi zapis u bazu');
        } else {

            $this->command->getOutput()->error('Grad već postoji u bazi.');
        }
    }
}
