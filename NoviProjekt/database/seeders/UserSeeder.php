<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $name = $this->command->getOutput()->ask('Unesite ime korisnika');
        $email = $this->command->getOutput()->ask('Unesite email korisnika');

        $password = $this->command->getOutput()->ask('Koju šifru da unesem u bazu?', 1234);

        $faker = Factory::create();


        if (!User::where('email', $email)->exists()) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);

            $this->command->getOutput()->info('Korisnik je uspješno upisan u bazu');
        } else {

            $this->command->getOutput()->error('Korisnik sa ovim mailom već postoji u bazi.');
        }
    }
}
