<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Kamus Perasaanku',
            'role' => 'Admin',
            'email' => 'admin@kamusperasaanku.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin123!'), 
            'status' => 'ACTIVE',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User Kamus Perasaanku',
            'role' => 'User',
            'email' => 'user@kamusperasaanku.com',
            'email_verified_at' => now(),
            'password' => Hash::make('User123!'), 
            'status' => 'ACTIVE',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
