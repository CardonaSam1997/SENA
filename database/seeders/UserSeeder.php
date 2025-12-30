<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::insert([
            [
                'name' => 'Empresa Uno',
                'email' => 'empresa1@mail.com',
                'password' => Hash::make('password'),
                'phone' => '3000000001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Empresa Dos',
                'email' => 'empresa2@mail.com',
                'password' => Hash::make('password'),
                'phone' => '3000000002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan',
                'email' => 'prof1@mail.com',
                'password' => Hash::make('password'),
                'phone' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pedro',
                'email' => 'prof2@mail.com',
                'password' => Hash::make('password'),
                'phone' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
