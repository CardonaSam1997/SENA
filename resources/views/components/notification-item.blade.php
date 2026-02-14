@props(['notification', 'clickable' => true])

@php
    $type = $notification->data['type'];

    $config = match($type) {
        'task_assigned' => ['icon' => 'fa-tasks', 'bg' => 'bg-primary'],
        'task_due_soon' => ['icon' => 'fa-clock', 'bg' => 'bg-warning'],
        'task_completed' => ['icon' => 'fa-check-circle', 'bg' => 'bg-success'],
        'task_suggestion' => ['icon' => 'fa-comment-dots', 'bg' => 'bg-info'],
        'task_access_request' => ['icon' => 'fa-door-open', 'bg' => 'bg-danger'],
        default => ['icon' => 'fa-bell', 'bg' => 'bg-secondary'],
    };
@endphp


@if($clickable)
    <a href="{{ route('notifications.show', $notification->id) }}"
       class="task-card text-decoration-none text-dark">
@else
     <div class="task-card bg-light border border-secondary-subtle text-muted" style="cursor: not-allowed;">
@endif
    <div class="task-img {{ $config['bg'] }}">
        <i class="fas {{ $config['icon'] }}"></i>
    </div>

    <div class="flex-grow-1 ms-3">
        <div class="task-header">
            <span class="task-title">{{ $notification->data['title'] }}</span>
            <small>{{ $notification->created_at->format('d/m/Y') }}</small>
        </div>

        <p class="task-desc mb-0">
            {{ $notification->data['message'] }}
        </p>
    </div>

</a>