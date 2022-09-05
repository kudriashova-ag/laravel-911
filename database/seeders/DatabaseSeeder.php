<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Anastacia',
            'email' => 'kudriashova.ag@gmail.com',
            'password' => Hash::make('12345678'),
            'role' =>'admin'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'not admin',
            'email' => 'notadmin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
