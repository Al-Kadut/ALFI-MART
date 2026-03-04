<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Memanggil model User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'), // Hash::make digunakan agar password dienkripsi (aman)
            'role' => 'admin'
        ]);

        // Membuat akun Kasir
        User::create([
            'name' => 'Kasir Toko',
            'username' => 'kasir',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir'
        ]);
    }
}