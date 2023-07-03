<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password123'),
                'country' => 'USA',
                'phone_number' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password456'),
                'country' => 'Canada',
                'phone_number' => '9876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Lee',
                'email' => 'david@example.com',
                'password' => bcrypt('password789'),
                'country' => 'Australia',
                'phone_number' => '5678901234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emma Davis',
                'email' => 'emma@example.com',
                'password' => bcrypt('passwordabc'),
                'country' => 'USA',
                'phone_number' => '8901234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael@example.com',
                'password' => bcrypt('passwordxyz'),
                'country' => 'Canada',
                'phone_number' => '4321098765',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
