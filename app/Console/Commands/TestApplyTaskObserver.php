<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ApplyTask;
use App\Models\Task;

class TestApplyTaskObserver extends Command
{
    protected $signature = 'test:apply-task-observer';
    protected $description = 'Prueba el ApplyTaskObserver creando aplicaciones de tareas';

    public function handle()
    {
        $this->info('Iniciando prueba ApplyTaskObserver...');

        // Validar tareas
        if (!Task::find(5) || !Task::find(6)) {
            $this->error('Las tareas 5 o 6 no existen');
            return Command::FAILURE;
        }

        // Limpiar registros previos
        ApplyTask::where('professional_id', 1)
            ->whereIn('task_id', [5, 6])
            ->delete();

        // Caso 1: aplica con sugerencia
        ApplyTask::create([
            'professional_id' => 1,
            'task_id' => 5,
            'score' => 90,
            'suggestion' => 'Propongo mejorar el enfoque del proyecto',
        ]);

        $this->info('✔ Profesional aplicó a tarea 5 con sugerencia');

        // Caso 2: aplica sin sugerencia
        ApplyTask::create([
            'professional_id' => 1,
            'task_id' => 6,
            'score' => 80,
        ]);

        $this->info('✔ Profesional aplicó a tarea 6 sin sugerencia');

        $this->info('Prueba finalizada. Revisa notificaciones.');

        return Command::SUCCESS;
    }
}
