<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::insert([
            [
                'username' => 'Empresa Uno',
                'email' => 'company@mail.com',
                'password' => Hash::make('123'),                
                'role' => 'company',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Empresa Dos',
                'email' => 'empresa2@mail.com',
                'password' => Hash::make('123'),                
                'role' => 'company',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Juan',
                'email' => 'worker@mail.com',
                'password' => Hash::make('123'),                
                'role' => 'professional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Pedro',
                'email' => 'admin@mail.com',
                'password' => Hash::make('123'),                
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}