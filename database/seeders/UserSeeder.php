<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect();
        for ($i = 1; $i <= 10; $i++){
            $user = User::create([
                'email' => 'user'.$i.'@szerveroldali.hu',
                'name' => fake('hu_HU')->name(),
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'admin' => rand(1, 10) < 2
            ]);
            $users -> add($user);
        }
    }
}
