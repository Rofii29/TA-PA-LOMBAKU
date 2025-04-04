<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan pengguna dengan role mahasiswa
        User::create([
            'name' => 'Mahasiswa User',
            'email' => 'mahasiswa@gmail.com',
            'phone' => '081234567890',
            'password' => Hash::make('12345678'),
            'role' => 'mahasiswa',
        ]);

        // Menambahkan pengguna dengan role dosen
        User::create([
            'name' => 'Dosen User',
            'email' => 'dosen@gmail.com',
            'phone' => '082345678901',
            'password' => Hash::make('12345678'),
            'role' => 'dosen',
        ]);

        // Menambahkan pengguna dengan role admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'phone' => '083456789012',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }
}
