<?php

namespace App\Notifications; 

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Task;

class TaskAboutToExpireNotification extends Notification
{
    use Queueable;

    public function __construct(public Task $task) {}

    public function via($notifiable)
    {
        return ['database']; 
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'task_due_soon',
            'title' => 'Tarea próxima a vencer',
            'message' => "La tarea \"{$this->task->title}\" vence el " .optional($this->task->expiration_date)->format('d/m/Y'),
            'task_id' => $this->task->id,
            'expiration_date' => $this->task->expiration_date,
        ];
    }

}