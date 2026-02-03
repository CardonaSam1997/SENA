<?php

namespace App\Notifications;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TaskCompletedNotification extends Notification
{
    use Queueable;

    public function __construct(public Task $task)
    {
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'task_completed',
            'task_id' => $this->task->id,
            'title' => 'Tarea completada',
            'message' => "La tarea \"{$this->task->title}\" fue completada exitosamente en el área de {$this->task->area}.",
            'state' => $this->task->state,
        ];
    }
}