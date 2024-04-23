<?php

namespace Database\Seeders;

use App\Models\Contest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contests = collect();
        for ($i = 0; $i < 4; $i++) {
            $h = "";
            for ($j = 0; $j < rand(2, 10); $j++) {
                
            }
            $contest = Contest::create([
                'win' => rand(1, 2) == 2,
            ]);
        }
    }
}
