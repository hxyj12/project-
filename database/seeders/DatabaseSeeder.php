<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\members;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        members::create([ 
            'name' => 'Alan',
            'class' => '4p',
            'mark' => '80',
        ]);

        members::create([
            'name' => 'Chun Damn',
            'class' => '2p',
            'mark' => '87',
        ]);

        members::create([
            'name' => 'Echo',
            'class' => '5p',
            'mark' => '91',
        ]);
    }
} 
