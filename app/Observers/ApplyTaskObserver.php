<?php

namespace App\Observers;

use App\Models\ApplyTask;
use App\Notifications\TaskAccessRequestNotification;
use App\Notifications\TaskSuggestionNotification;

class ApplyTaskObserver
{

    public function created(ApplyTask $applyTask): void
    {
        $task = $applyTask->task;
        $professional = $applyTask->professional;
        $user = $task?->company?->user;

        if (
            $user &&
            $professional &&
            !$user->notifications()
                ->where('data->type', 'task_access_request')
                ->where('data->task_id', $applyTask->task_id)
                ->where('data->professional_id', $applyTask->professional_id)
                ->exists()
        ) {
            $user->notify(
                new TaskAccessRequestNotification(
                    $task,
                    $professional
                )
            );
        }
    }

    public function updated(ApplyTask $applyTask): void
    {
        if ($applyTask->wasChanged('suggestion') && $applyTask->suggestion) {

            $task = $applyTask->task;
            $professional = $applyTask->professional;
            $user = $task?->company?->user;

            if (
                $user &&
                !$user->notifications()
                    ->where('data->type', 'task_suggestion')
                    ->where('data->task_id', $applyTask->task_id)
                    ->where('data->professional_id', $applyTask->professional_id)
                    ->exists()
            ) {
                $user->notify(
                    new TaskSuggestionNotification(
                        $task,
                        $applyTask->suggestion,
                        $professional
                    )
                );
            }
        }
    }
}