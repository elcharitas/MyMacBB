<?php

use Illuminate\Database\Seeder;
use App\{User, Board, Partner};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => '4rum Host',
            'username' => 'nathan',
            'password' => bcrypt('password'),
            'email' => 'support@4rum.com',
            'email_verified_at' => now(),
        ]);
        
        Partner::create([
            'domains' => 'localhost',
            'user_id' => $user->id,
            'api_key' => str()->random(16)
        ]);
        
        Board::create([
            'api_key' => str()->uuid(),
            'user_id' => $user->id
        ])->addDomain('www', true);
        
        Board::create([
            'api_key' => str()->uuid(),
            'user_id' => $user->id
        ])->addDomain('localhost', true);
    }
}
