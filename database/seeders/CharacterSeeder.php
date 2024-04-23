<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $characters = collect();
        for ($i = 0; $i < 10; $i++) {
            $character = Character::create([
                'name' => fake()->safari(),
                'enemy' => rand(1, 10) < 2,
                'defence' => rand(1, 20),
                'strength' => rand(1, 20),
                'accuracy' => rand(1, 20),
                'magic' => rand(1, 20),
            ]);
            $characters->add($character);
        }
    }
}
