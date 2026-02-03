<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\TaskAboutToExpireNotification;
use Carbon\Carbon;

class NotifyTasksAboutToExpire extends Command
{
    protected $signature = 'tasks:check-expiring';
    protected $description = 'Notifica tareas que vencen en 3 días';

    public function handle()
    {
        $today = Carbon::today();
        $limit = Carbon::today()->addDays(3);

        $tasks = Task::whereBetween('expiration_date', [$today, $limit])
            ->where('enable', 1)
            ->get();

        if ($tasks->isEmpty()) {
            $this->info('No hay tareas próximas a vencer.');
            return;
        }

        foreach ($tasks as $task) {
            $user = $task->company->user;

            $alreadyNotified = $user->notifications()
                ->where('data->task_id', $task->id)
                ->where('data->type', 'task_due_soon')
                ->exists();

            if (!$alreadyNotified) {
                $user->notify(new TaskAboutToExpireNotification($task));
                $this->info("Notificada tarea ID {$task->id} (vence {$task->expiration_date->format('Y-m-d')})");
            }
        }
    }
}
