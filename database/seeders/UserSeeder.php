<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
          'email' => 'admin@gmail.com',
          'role' => 'Admin'
        ]);

        \App\Models\User::factory()->create([
          'email' => 'member@gmail.com',
          'role' => 'Member'
        ]);
        
    }
}
