<?php
namespace Database\Seeders;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder {
    public function run(): void {

        Task::insert([
            // Compañía 1
            [
                'company_id' => 1,
                'title' => 'Desarrollo API REST',
                'content' => 'Construcción de API en Laravel',
                'area' => 'Backend',
                'state' => 'pendiente',
                'enable' => true,
                'money' => 1500000,
                'expiration_date' => Carbon::now()->addDays(15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 1,
                'title' => 'Optimización Base de Datos',
                'content' => 'Mejorar consultas MySQL',
                'area' => 'Base de Datos',
                'state' => 'asignada',
                'enable' => true,
                'money' => 900000,
                'expiration_date' => Carbon::now()->addDays(20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 1,
                'title' => 'Mantenimiento Sistema',
                'content' => 'Corrección de bugs',
                'area' => 'Soporte',
                'state' => 'finalizada',
                'enable' => true,
                'money' => 600000,
                'expiration_date' => Carbon::now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Compañía 2
            [
                'company_id' => 2,
                'title' => 'Instalación Servidor',
                'content' => 'Configuración de servidor Linux',
                'area' => 'Infraestructura',
                'state' => 'pendiente',
                'enable' => true,
                'money' => 1200000,
                'expiration_date' => Carbon::now()->addDays(18),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'title' => 'Seguridad de Red',
                'content' => 'Implementar firewall',
                'area' => 'Redes',
                'state' => 'asignada',
                'enable' => true,
                'money' => 1800000,
                'expiration_date' => Carbon::now()->addDays(25),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'title' => 'Backup y Recuperación',
                'content' => 'Estrategia de respaldos',
                'area' => 'Infraestructura',
                'state' => 'pendiente',
                'enable' => true,
                'money' => 700000,
                'expiration_date' => Carbon::now()->addDays(12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
