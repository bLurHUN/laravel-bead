<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Contest;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Contest::all() as $contest) {
            $enemy_hp = 20;
            $hero_hp = 20;
            if ($contest->win) {
                $enemy_hp = 0;
            } else {
                $hero_hp = 0;
            }

            DB::table('character_contest')->insert([
                'contest_id' => $contest->id,
                'character_id' => $contest->user->characters->random()->id,
                'hero_hp' => $hero_hp,
                'enemy_hp' => $enemy_hp,
            ]);

            DB::table('character_contest')->insert([
                'contest_id' => $contest->id,
                'character_id' => Character::all()->where('enemy', '=', true)->random()->id,
                'hero_hp' => $hero_hp,
                'enemy_hp' => $enemy_hp,
            ]);
        }
    }
}
