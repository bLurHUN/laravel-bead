<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = collect();
        for ($i = 0; $i < 3; $i++) {
            $place = Place::create([
                'name' => fake()->country,
                'imgURI' => fake()->imageUrl(1280, 720, 'Place'),
            ]);
            $places->add($place);
        }
    }
}
