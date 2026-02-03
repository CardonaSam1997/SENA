<?php

namespace App\Observers;

use App\Models\ApplyTask;

class ApplyTaskObserver
{
    public function updated(ApplyTask $applyTask): void
    {
        if ($applyTask->wasChanged('suggestion') && $applyTask->suggestion) {
            $company = $applyTask->task->company;

            if (
                $company &&
                !$company->notifications()
                    ->where('data->type', 'task_suggestion')
                    ->where('data->task_id', $applyTask->task_id)
                    ->where('data->professional_id', $applyTask->professional_id)
                    ->exists()
            ) {
                $company->notify(
                    new TaskSuggestionNotification(
                        $applyTask->task,
                        $applyTask->suggestion,
                        $applyTask->professional
                    )
                );
            }
        }
    }
}