<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;
use App\Models\Task;
use App\Models\ApplyTask;


class NotificationController extends Controller{
    

    public function read()
    {
        $notifications = auth()->user()
            ->notifications()
            ->whereNotNull('read_at')
            ->latest()
            ->get();

        $active = collect();
        $deleted = collect();

        foreach ($notifications as $notification) {

            $taskId = $notification->data['task_id'] ?? null;

            $exists = $taskId
                ? Task::where('id', $taskId)->exists()
                : false;

            if ($exists) {
                $active->push($notification);
            } else {
                $deleted->push($notification);
            }
        }

        return view('notifications.notification-read', compact('active', 'deleted'));
    }

    public function index()
    {
        $notifications = auth()->user()->notifications;
        return view('notifications.index', compact('notifications'));
    }

    public function show(DatabaseNotification $notification)
    {
        // Seguridad
        abort_if($notification->notifiable_id !== auth()->id(), 403);

        // Marcar como leída
        if (is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return match ($notification->data['type']) {
            'task_access_request' =>
                $this->taskAccessRequest($notification),
            'task_suggestion' =>
                $this->taskSuggestions($notification),
            'task_due_soon' =>
                $this->taskDueSoon($notification),
            'task_completed' =>
                $this->taskCompleted($notification),
            default => abort(404)
        };
    }


    //TIPOS DE NOTIFIACION
    private function taskAccessRequest(DatabaseNotification $notification)
    {
        $task = Task::findOrFail($notification->data['task_id']);

        $applications = ApplyTask::with('professional.user')
            ->where('task_id', $task->id)
            ->get();

        return view('notifications.types.task-access', compact(
            'notification',
            'task',
            'applications'
        ));
    }

    private function taskSuggestions(DatabaseNotification $notification)
    {
        $task = Task::findOrFail($notification->data['task_id']);

        $applications = ApplyTask::with('professional.user')
            ->where('task_id', $task->id)
            ->whereNotNull('suggestion')
            ->get();

        return view('notifications.types.task-suggestions', compact(
            'notification',
            'task',
            'applications'
        ));
    }

    private function taskDueSoon(DatabaseNotification $notification)
    {
        $task = Task::findOrFail($notification->data['task_id']);

        return view('notifications.types.task-due-soon', compact(
            'notification',
            'task'
        ));
    }

    private function taskCompleted(DatabaseNotification $notification)
    {
        $task = Task::with('applyTasks.professional.user')
            ->findOrFail($notification->data['task_id']);

        $applyTask = $task->applyTasks
            ->where('authorization', true)
            ->firstOrFail();

        $professional = $applyTask->professional;

        return view('notifications.types.task-completed', compact(
            'notification',
            'task',
            'professional'
        ));
    }
}