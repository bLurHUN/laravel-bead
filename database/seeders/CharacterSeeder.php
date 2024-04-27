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
        $stats = 20;

        $defence = rand(0, 3);
        $stats -= $defence;

        $accuracy = rand(0, $stats);
        $stats -= $accuracy;

        $magic = rand(0, $stats);
        $stats -= $magic;

        $strength = $stats;

        DB::table('characters')->insert([
            'name' => fake()->firstName(),
            'user_id' => User::all()->where('admin', '=', true)->random()->id,
            'enemy' => true,
            'defence' => $defence,
            'strength' => $strength,
            'accuracy' => $accuracy,
            'magic' => $magic,
        ]);


        for ($i = 0; $i < 10; $i++) {
            $enemy = rand(1, 10) < 2;
            $user_id = null;
            if ($enemy) {
                $user_id = User::all()->where('admin', '=', true)->random()->id;
            } else {
                $user_id = User::all()->where('admin', '=', false)->random()->id;
            }

            $stats = 20;

            $defence = rand(1, 3);
            $stats -= $defence;

            $accuracy = rand(1, $stats);
            $stats -= $accuracy;

            $magic = rand(1, $stats);
            $stats -= $magic;

            $strength = $stats;


            DB::table('characters')->insert([
                'name' => fake()->firstName(),
                'user_id' => $user_id,
                'enemy' => $enemy,
                'defence' => $defence,
                'strength' => $strength,
                'accuracy' => $accuracy,
                'magic' => $magic,
            ]);
        }
    }
}
