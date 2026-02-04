<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TaskAssignedNotification extends Notification
{
    public function __construct(public Task $task) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'task_assigned',
            'task_id' => $this->task->id,
            'title' => 'Nueva tarea asignada',
            'message' => "Se te asignó la tarea \"{$this->task->title}\" en el área de {$this->task->area}.",
        ];
    }
}