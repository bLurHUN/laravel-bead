<?php /** @noinspection ALL */

namespace Database\Seeders;

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 4; $i++) {
            // Create history
            $enemy_hp = 20;
            $hero_hp = 20;
            $hero_turn = true;
            $history = "20e 20h";
            $win = false;
            while ($enemy_hp > 0 || $hero_hp > 0) {
                $dmg = rand(1, 5);
                if ($hero_turn) {
                    $enemy_hp -= $dmg;
                    if ($enemy_hp <= 0) {
                        $win = true;
                        $enemy_hp = 0;
                    }
                    $history = $history . ' ' . $enemy_hp . 'e';
                    $hero_turn = false;
                } else {
                    $hero_hp -= $dmg;
                    if ($hero_hp <= 0) {
                        $win = false;
                        $hero_hp = 0;
                    }
                    $history = $history . ' ' . $hero_hp . 'h';
                    $hero_turn = true;
                }
            }

            DB::table("contests")->insert([
                'user_id' => User::whereHas('characters', function ($q) {
                   $q->where('admin', '=', false);
                })->get()->random()->id,
                'place_id' => Place::all()->random()->id,
                'win' => $win,
                'history' => $history,
            ]);
        }
    }
}
