<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Egy fix admin tesztelés miatt
        DB::table('users')->insert([
            'email' => 'user@szerveroldali.hu',
            'name' => fake('hu_HU')->name(),
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'admin' => true
        ]);

        for ($i = 1; $i <= 10; $i++){
            DB::table('users')->insert([
                'email' => 'user'.$i.'@szerveroldali.hu',
                'name' => fake('hu_HU')->name(),
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'admin' => rand(1, 10) < 2
            ]);
        }
    }
}
