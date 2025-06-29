<?php

namespace Database\Seeders;

use App\Models\Citie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Citie::create([
            'name' => 'Mostar',
            'description' => 'Trenutno je 29 stepeni C',
            'deg' => '29'
        ]);
    }
}
