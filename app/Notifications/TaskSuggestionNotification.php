<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskSuggestionNotification extends Notification
{
    public function __construct(
        public Task $task,
        public string $suggestion,
        public Professional $professional
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'task_suggestion',
            'task_id' => $this->task->id,
            'title' => 'Nueva sugerencia recibida',
            'message' => "{$this->professional->name} envió una sugerencia para la tarea \"{$this->task->title}\".",
        ];
    }
}