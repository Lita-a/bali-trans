<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::create([
            'name' => 'Toyota Avanza',
            'price' => 350000,
            'image' => '/images/avanza.jpg',
            'desc' => 'Mobil MPV 7-seater, nyaman untuk keluarga.'
        ]);
        Car::create([
            'name' => 'Toyota Innova',
            'price' => 500000,
            'image' => '/images/innova.jpg',
            'desc' => 'MPV menengah, nyaman dan luas, cocok untuk perjalanan wisata di Bali.'
        ]);

        Car::create([
            'name' => 'Toyota Fortuner',
            'price' => 650000,
            'image' => '/images/fortuner.jpg',
            'desc' => 'SUV premium 7-seater, ideal untuk perjalanan jarak jauh dan medan beragam.'
        ]);
        Car::create([
            'name' => 'Honda CR-V',
            'price' => 600000,
            'image' => '/images/crv.jpg',
            'desc' => 'SUV menengah, nyaman, irit bahan bakar, cocok untuk keluarga kecil.'
        ]);
    }
}
