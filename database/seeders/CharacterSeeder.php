<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Egy fix enemy character tesztelés miatt
        DB::table('characters')->insert([
            'name' => fake()->firstName(),
            'user_id' => User::all()->where('admin', '=', true)->random()->id,
            'enemy' => true,
            'defence' => rand(1, 20),
            'strength' => rand(1, 20),
            'accuracy' => rand(1, 20),
            'magic' => rand(1, 20),
        ]);


        for ($i = 0; $i < 10; $i++) {
            $enemy = rand(1, 10) < 2;
            $user_id = null;
            if ($enemy) {
                $user_id = User::all()->where('admin', '=', true)->random()->id;
            } else {
                $user_id = User::all()->where('admin', '=', false)->random()->id;
            }

            DB::table('characters')->insert([
                'name' => fake()->firstName(),
                'user_id' => $user_id,
                'enemy' => $enemy,
                'defence' => rand(1, 20),
                'strength' => rand(1, 20),
                'accuracy' => rand(1, 20),
                'magic' => rand(1, 20),
            ]);
        }
    }
}
