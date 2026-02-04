<?php

namespace App\Observers;

use App\Models\Task;
use App\Notifications\TaskCompletedNotification;

class TaskObserver
{
    public function updated(Task $task): void
    {
        if (
            $task->wasChanged('state') &&
            $task->state === 'finalizada'
        ) {
            $company = $task->company;
            $user = $company?->user;

            if (
                $user &&
                !$user->notifications()
                    ->where('data->type', 'task_completed')
                    ->where('data->task_id', $task->id)
                    ->exists()
            ) {
                $user->notify(
                    new TaskCompletedNotification($task)
                );
            }
        }
    }
}