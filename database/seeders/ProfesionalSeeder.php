<?php
namespace Database\Seeders;
use App\Models\Professional;
use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder {
    public function run(): void {
        Professional::insert([
            [
                'user_id' => 3,
                'document' => '123456',
                'name' => 'Juan',
                'last_name' => 'Perez',
                'address' => 'Calle 10',
                'experiencia' => 5,
                'service_type' => 'Software',
            ],
            [
                'user_id' => 4,
                'document' => '654321',
                'name' => 'Pedro',
                'last_name' => 'Gomez',
                'address' => 'Calle 20',
                'experiencia' => 3,
                'service_type' => 'Infraestructura',
            ],
        ]);
    }
}
