<?php
namespace Database\Seeders;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder {
    public function run(): void {
        Company::insert([
            [
                'user_id' => 1,
                'nit' => '900111222',
                'name' => 'Tech Solutions',
                'address' => 'Calle 1',
                'service_type' => 'Software',
            ],
            [
                'user_id' => 2,
                'nit' => '900333444',
                'name' => 'Infra Corp',
                'address' => 'Calle 2',
                'service_type' => 'Infraestructura',
            ],
        ]);
    }
}