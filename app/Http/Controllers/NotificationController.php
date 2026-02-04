<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use App\Models\Task;
use App\Models\ApplyTask;
use App\Models\Professional;

class NotificationController extends Controller{
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

    /* =======================
        TIPOS DE NOTIFICACIÓN
       ======================= */

    private function taskAccessRequest(DatabaseNotification $notification)
    {
        $task = Task::findOrFail($notification->data['task_id']);

        $applications = ApplyTask::with('professional.user')
            ->where('task_id', $task->id)
            ->get();

        return view('notifications.task-access', compact(
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

        return view('notifications.task-suggestions', compact(
            'notification',
            'task',
            'applications'
        ));
    }

    private function taskDueSoon(DatabaseNotification $notification)
    {
        $task = Task::findOrFail($notification->data['task_id']);

        return view('notifications.task-due-soon', compact(
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

        return view('notifications.task-completed', compact(
            'notification',
            'task',
            'professional'
        ));
    }
}