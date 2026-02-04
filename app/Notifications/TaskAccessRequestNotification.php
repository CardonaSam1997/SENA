<?php

namespace App\Notifications;

use App\Models\Professional;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TaskAccessRequestNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Task $task,
        public Professional $professional
    ) {
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'task_access_request',
            'task_id' => $this->task->id,
            'professional_id' => $this->professional->id,
            'title' => 'Solicitud de acceso a la tarea',
            'message' => "{$this->professional->name} solicitó permiso para acceder a la tarea \"{$this->task->title}\".",
        ];
    }
}