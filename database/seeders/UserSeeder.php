<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User Data
        DB::table('users')->insert([
            'name' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
        ]);

        // Approver User Data
        DB::table('users')->insert([
            'name' => 'Andi',
            'role' => 'Approver',
            'email' => 'andi@gmail.com',
            'password' => Hash::make('andi1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Budi',
            'role' => 'Approver',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Chaki',
            'role' => 'Approver',
            'email' => 'chaki@gmail.com',
            'password' => Hash::make('chaki1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dodit',
            'role' => 'Approver',
            'email' => 'dodit@gmail.com',
            'password' => Hash::make('dodit1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Elang',
            'role' => 'Approver',
            'email' => 'elang@gmail.com',
            'password' => Hash::make('elang1234'),
        ]);

    }
}
