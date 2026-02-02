<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\TaskAboutToExpireNotification;
use Carbon\Carbon;

class NotifyTasksAboutToExpire extends Command
{
    protected $signature = 'tasks:notify-expiring';
    protected $description = 'Notifica tareas que vencen en 3 días';

    public function handle()
    {
        $targetDate = Carbon::now()->addDays(3)->startOfDay();

        $tasks = Task::whereDate('due_date', $targetDate)
            ->where('status', '!=', 'completed')
            ->get();

        foreach ($tasks as $task) {

            //Notificar a la empresa
            if ($task->company && $task->company->user) {
                $task->company->user
                    ->notify(new TaskAboutToExpireNotification($task));
            }

            //Notificar al profesional asignado
            if ($task->professional) {
                $task->professional
                    ->notify(new TaskAboutToExpireNotification($task));
            }
        }

        $this->info('Notificaciones enviadas correctamente.');
    }
}
