<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAboutToExpireNotification extends Notification
{
    use Queueable;

    public function __construct(public Task $task) {}

    public function via($notifiable)
    {
        return ['database']; // Solo notificación en base de datos
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'task_due_soon',
            'title' => 'Tarea próxima a vencer',
            'message' => "La tarea \"{$this->task->title}\" vence el {$this->task->due_date->format('d/m/Y')}.",
            'task_id' => $this->task->id,
            'due_date' => $this->task->due_date,
        ];
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications.index', compact('notifications'));
    }

}

